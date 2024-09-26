<?php

namespace App\Http\Controllers\Backend\API\Knowledge;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contributor;
use App\Jobs\SendEmailJob;
use App\Mail\PostMail;
use App\Models\User;
use App\Models\Admin;
use DB;

class VerificatorController extends Controller
{
    /**
     * publish konten pengetahuan
     * 
     * @param Request $request
     * @param Contributor $contributor
     * @param User $user
     * @param Admin $admin
     * 
     */
    public function publish (Request $request, Contributor $contributor, User $user, Admin $admin) {
        try {
            DB::beginTransaction();
            $dataContributor = $contributor->find($request->id);

            if(request('user') == 'verifikator') {
                $contributor = $contributor->find($request->id)->update([
                    'status_verifikator' => (boolean) request('status'),
                    'id_user_verificator' => $request->user()->id
                ]);

                $admin = $admin::first();
                if($user) {
                    $postMail = [
                        'email' => [$admin->email],
                        'title' => 'Konten Pengetahuan dengan judul ' .' " '.$dataContributor['judul'].' " ' . 'di verifikasi',
                        'status' => 'verifikasi_verifikator',
                        'body' => '',
                    ];

                    dispatch(new SendEmailJob($postMail));
                }

            } else  {
                $contributor = $contributor->find($request->id)->update(['status' => request('status')]);

                $user = $user::find(request('id_user'));

                if($user) {
                    $postMail = [
                        'email' => [$user->email],
                        'title' => 'Konten Pengetahuan Anda dengan judul ' .' " '.$dataContributor['judul'].' " ' . 'di publish',
                        'status' => 'published',
                        'body' => '',
                    ];

                    dispatch(new SendEmailJob($postMail));
                }
            }
            
            DB::commit();
            return response()->json(['message' => 'Konten has been published'], 201);
        }catch(\Illuminate\Database\QueryException $ex) {
            DB::rollBack();
            return response()->json(['error' => 'An error occurred creating data: ' . $ex->getMessage()], 400);
        }catch(\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'An error occurred while creating data: ' . $e->getMessage()], 400);
        }
    }

    /**
     * publish konten pengetahuan
     * 
     * @param Request $request
     * @param Contributor $contributor
     * @param User $user
     */
    public function revisi(Request $request, Contributor $contributor, User $user) {
        try {
            DB::beginTransaction();
                $dataContributor = $contributor->find($request->id);

                if(request('user') == 'verifikator') {
                    $contributor = $dataContributor->update(['status_verifikator' => (boolean) request('status')]);
                } else {
                    $contributor = $dataContributor->update(
                        [
                            'status' => request('status'),
                            'status_verifikator' => (boolean) false
                        ]
                    );

                    $user = $user::find(request('id_user'));

                    if($user) {
                        $postMail = [
                            'email' => [$user->email],
                            'title' => 'Konten Pengetahuan Anda dengan judul ' .' " '.$dataContributor['judul'].' " ' . 'di revisi',
                            'status' => 'revisi',
                            'body' => '',
                        ];

                        dispatch(new SendEmailJob($postMail));
                    }
                }
                
                // $users = $user::with('roles')->whereHas('roles', function ($query) {
                //     $query->where('role_id', 2);
                // })->get();

                // foreach($users as $user) {
                //     $postMail = [
                //         'email' => [$user['email']],
                //         'title' => 'Konten Pengetahuan Anda dengan judul ' .' " '.$dataContributor['judul'].' " ' . 'di revisi',
                //         'status' => 'revisi',
                //         'body' => $dataContributor,
                //     ];
            
                //     dispatch(new SendEmailJob($postMail));
                // }

            DB::commit();
            return response()->json(['message' => 'Konten has been revision'], 201);
        }catch(\Illuminate\Database\QueryException $ex) {
            DB::rollBack();
            return response()->json(['error' => 'An error occurred creating data: ' . $ex->getMessage()], 400);
        }catch(\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'An error occurred while creating data: ' . $e->getMessage()], 400);
        }
    }

    /**
     * komentar verifikator
     * 
     * @param Request $request
     * @param Contributor $contributor
     * @param User $user
     */
    public function komentar (Request $request, Contributor $contributor, User $user) {
        try {
            DB::beginTransaction();
                $dataContributor = $contributor->find($request->id);
                $detail = null;
                $textEditor = $request->komentar;
               
                if(!empty($textEditor)) {
                    $dom = new \domdocument();
                    @$dom->loadHtml($textEditor, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
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
                
                $update = $dataContributor->update(['komentar' => $detail]);
                
            DB::commit();
            return response()->json(['message' => 'Konten has been commented'], 201);
        }catch(\Illuminate\Database\QueryException $ex) {
            DB::rollBack();
            return response()->json(['error' => 'An error occurred creating data: ' . $ex->getMessage()], 400);
        }catch(\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'An error occurred while creating data: ' . $e->getMessage()], 400);
        }
    }   
}
