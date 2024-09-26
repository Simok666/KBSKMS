<?php

namespace App\Http\Controllers\Backend\API\Knowledge;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contributor;
use App\Http\Resources\Backend\ContributorResource;
use DB;
use App\Models\Kategori;
use App\Models\User;
use App\Models\Role;
use App\Jobs\SendEmailJob;
use App\Models\Admin;
use App\Models\Operator;

class ContributorController extends Controller
{
    /**
     * add or update contributor
     * 
     * @param Contributor $contributor
     * @param User $user
     * @param Admin $admin
     * @param Operator $operator
     */
    public function contributor(Request $request, Contributor $contributor, User $user, Admin $admin, Operator $operator) {
        try {
          DB::beginTransaction();   
          $data = collect($request->repeater)->map(function ($item) use ($request, $contributor, $admin, $user, $operator) {
             $textEditor = $item['dekskripsi'];
             $contenIframe = false;

             if(!empty($textEditor)) {
                $dom = new \domdocument();
                @$dom->loadHtml($textEditor, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
                $images = $dom->getElementsByTagName('img');
                $iframes = $dom->getElementsByTagName('iframe');

                if($iframes->length > 0) {
                    $contenIframe = true;
                } else {
                    $contenIframe = false;
                }
               
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

             $role = $request->user()->currentAccessToken()->abilities;
             $role = explode(':', $role[0])[1] ?? "";

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
                      'status' => "verifikasi",
                      'status_verifikator' => (boolean) false,
                      'id_user' => ($role == "user") ? $request->user()->id : null,
                      'id_admin' => ($role == "admin") ? $request->user()->id : null,
                      'role' => $role,
                      'has_video_embed' => (boolean) $contenIframe,
                      'slug' => $item['slug']
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

                $admin = $admin::first();
                $operator = $operator::first();
                $users = $user::with('roles')->whereHas('roles', function ($query) {
                    $query->where('role_id', 2);
                })->get();
                if ($dataContributor) {
                    foreach ($users as $user ) {
                        
                            $postMail = [
                                'email' => [$user['email']],
                                'title' => 'Konten Pengetahuan baru sudah di buat dan sedang di verifikasi',
                                'status' => 'konten',
                                'body' => $dataContributor,
                            ];
                    
                        dispatch(new SendEmailJob($postMail));
                    }
                    
                    // $postAdmin = [
                    //     'email' => [$admin->email, $operator->email],
                    //     'title' => 'Konten Pengetahuan baru sudah di buat mohon di check untuk di publish atau revisi',
                    //     'status' => 'verifikator',
                    //     'body' => $dataContributor,
                    // ];

                    // dispatch(new SendEmailJob($postAdmin));
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
        return ContributorResource::collection(
            $contributor::with('kategori', 'user')
            ->when(request()->filled("id"), function ($query){
                $query->where('id', request("id"));
            })->paginate($request->limit ?? "10")
        );
    }

    /**
     * 
     * get Contributor
     * 
     * @param Contributor $contributor
     */
    public function getMultimedia(Contributor $contributor) {
        return ContributorResource::collection(
            $contributor::with('kategori', 'user')
            ->when(request()->filled("id"), function ($query){
                $query->where('id', request("id"));
            })
            ->where('has_video_embed', true)
            ->where('status', 'publish')
            ->paginate($request->limit ?? "10")
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
     * @param Request $request
     * @param User $user
     */
    public function listUser(Request $request, User $user) {
        return $user::where('id' ,'<>', $request->user()->id)
        ->where('is_verified', 1)
        ->get();
    }
}
