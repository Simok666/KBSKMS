<?php

namespace App\Http\Controllers\Backend\API\Knowledge;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contributor;
use App\Http\Resources\Backend\ContributorResource;
use DB;
use App\Models\Kategori;
use App\Models\User;

class ContributorController extends Controller
{
    /**
     * add or update contributor
     * 
     * @param Contributor $contributor
     */
    public function contributor(Request $request, Contributor $contributor) {
        try {
          DB::beginTransaction();   
          $data = collect($request->repeater)->map(function ($item) use ($contributor) {
             $textEditor = $item['dekskripsi'];
            
             if(!empty($textEditor)) {
                $dom = new \domdocument();
                $dom->loadHtml($textEditor, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
                $images = $dom->getElementsByTagName('img');
               
                foreach($images as $key => $img) {
                    
                    $data = $img->getattribute('src');
                    if (strpos($data, 'data:image') !== false) {
                        list($type, $data) = explode(';', $data);
                        list(, $data)      = explode(',', $data);
                        $data = base64_decode($data);
                        
                        $image_name= '/editor/' . time().$key.'.png';
                        $path = public_path() . $image_name;
                        
                        file_put_contents($path, $data);

                        $img->removeattribute('src');
                        $img->setattribute('src', $image_name);
                    }
                }
                $detail = $dom->savehtml();
            } else {
                $detail = null;
            }
            
             $dataContributor = $contributor::updateOrCreate(
                  [
                      'id' => $item['id'] ?? null,
                  ],
                  [
                      'judul' => $item['judul'],
                      'dekskripsi' => $detail,
                      'id_kategori' => $item['id_kategori'],
                      'tag' => $item['tag'],
                      'id_user_contributor' => $item['id_user_contributor'] ?? null,
                      'tipe' => $item['tipe'],
                  ]
              );

                if($image_thumbnails = $item['image_thumbnail']) {
                    foreach ($image_thumbnails as $image_thumbnail) {
                        $dataContributor->clearMediaCollection('image_thumbnail');
                        $dataContributor->addMedia($image_thumbnail)->toMediaCollection('image_thumbnail');
                    }
                }

                if($upload_lampirans = $item['upload_lampiran']) {
                    foreach ($upload_lampirans as $upload_lampiran) {
                        $dataContributor->clearMediaCollection('upload_lampiran');
                        $dataContributor->addMedia($upload_lampiran)->toMediaCollection('upload_lampiran');
                    }
                }
          });

          DB::commit();
          return response()->json(['message' => 'Contributor has been created or updated successfully'], 201);
        }catch(\Illuminate\Database\QueryException $ex) {
            DB::rollBack();
            return response()->json(['error' => 'An error occurred creating data: ' . $ex->getMessage()], 400);
        }catch(\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'An error occurred while creating data: ' . $e->getMessage()], 400);
        }
    }

    /**
     * 
     * get Contributor
     * 
     * @param Contributor $contributor
     */
    public function getContributor(Contributor $contributor) {
        // dd(request("id"));
        return ContributorResource::collection(
            $contributor::with('kategori', 'user')
            ->when(request()->filled("id"), function ($query){
                $query->where('id', request("id"));
            })->paginate($request->limit ?? "10")
        );
    }

    /**
     * get list kategori
     * 
     * @param Kategori $kategori
     */
    public function listKategori(Kategori $kategori) {
        return $kategori::all();
    }

    /**
     * get list user
     * 
     * @param User $user
     */
    public function listUser(User $user) {
        return $user::all();
    }
}
