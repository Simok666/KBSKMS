<?php

namespace App\Http\Controllers\Backend\API\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\Backend\Admin\UserResources;
use App\Http\Requests\Backend\Admin\AdminVerifiedRequest;
use App\Models\User;
use App\Models\EselonSatu;
use App\Models\EselonDua;
use App\Models\EselonTiga;
use App\Models\Fungsi;
use App\Jobs\SendEmailJob;
use App\Http\Resources\Backend\Admin\DataEselonFungsiResource;
use DB;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class AdminController extends Controller
{
    /**
     * function get User
     * 
     * @param User $user
     * 
     */
    public function getUser () {
        return UserResources::collection(
            User::with('eselon_satu', 'eselon_dua', 'eselon_tiga', 'fungsi')
            ->when(request()->filled("id"), function ($query){
                $query->where('id', request("id"));
            })->paginate($request->limit ?? "10")
        );
    }

    /**
     * function fo update verified pic user account
     * 
     * @param AdminVerifiedRequest $request
     * @param User $user
     * 
     * @return JsonResponse
     * 
     */
    public function verified(AdminVerifiedRequest $request, User $user)
    {   
        try {
            $users = $user::find($request->id);
            $users->is_verified = (Boolean) $request->is_verified;
            $users->save();
            
            if($users->is_verified) {

                $postMail = [
                    'email' => $users->email,
                    'title' => 'Your Account Has Been Verified',
                    'status' => 'verifikasi',
                    'role' => auth()->user()->toArray()['name'],
                    'role_to' => 'PIC',
                    'body' => $users,
                ];
                
                dispatch(new SendEmailJob($postMail));
                
            }

            return response()->json(['message' => 'User updated successfully'], HttpResponse::HTTP_CREATED);
            
            return response()->json(['message' => 'Your Account has been verified'], 409);
        } catch(\Exception $e) {
            return response()->json(['error' => 'An error occurred while updating data: ' . $e->getMessage()], 400);
        }   
    }

    /**
     * add satuan kerja eselon 1 
     * 
     * @param EselonSatuReqeust $request
     * @param EselonSatu $eselonSatu
     * 
     */
    public function eselonSatu(Request $request, EselonSatu $eselonSatu) {
      try {
        DB::beginTransaction();   
        $data = collect($request->repeater)->map(function ($item) use ($eselonSatu) {
            $eselonSatu::updateOrCreate(
                [
                    'id' => $item['id'] ?? null,
                ],
                [
                    'nama_satuan_kerja_eselon_1' => $item['nama_satuan_kerja_eselon_1'],
                ]
            );
        DB::commit();
        });
        return response()->json(['message' => 'Eselon Satu has been created or updated successfully'], 201);
    }catch(\Illuminate\Database\QueryException $ex) {
        DB::rollBack();
        return response()->json(['error' => 'An error occurred creating data: '. $ex->getMessage()], 400);
    }catch(\Exception $e) {
        DB::rollBack();
        return response()->json(['error' => 'An error occurred while creating data: ' . $e->getMessage()], 400);
    }
    }

    /**
     * add satuan kerja eselon 2
     * 
     * @param EselonDua $eselonDua
     */
    public function eselonDua(Request $request, EselonDua $eselonDua) {
        try {
          DB::beginTransaction();   
          $data = collect($request->repeater)->map(function ($item) use ($eselonDua) {
              $eselonDua::updateOrCreate(
                  [
                      'id' => $item['id'] ?? null,
                  ],
                  [
                      'id_eselon_satu' => $item['id_eselon_satu'],
                      'nama_satuan_kerja_eselon_2' => $item['nama_satuan_kerja_eselon_2'],
                  ]
              );
          DB::commit();
          });
          return response()->json(['message' => 'Eselon Dua has been created or updated successfully'], 201);
        }catch(\Illuminate\Database\QueryException $ex) {
            DB::rollBack();
            return response()->json(['error' => 'An error occurred creating data: id eselon not found'], 400);
        }catch(\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'An error occurred while creating data: ' . $e->getMessage()], 400);
        }
      }

    /**
     * add satuan kerja eselon 3
     * 
     * @param EselonTiga $eselonTiga
     */
    public function eselonTiga(Request $request, EselonTiga $eselonTiga) {
        try {
          DB::beginTransaction();   
          $data = collect($request->repeater)->map(function ($item) use ($eselonTiga) {
              $eselonTiga::updateOrCreate(
                  [
                      'id' => $item['id'] ?? null,
                  ],
                  [
                      'id_eselon_dua' => $item['id_eselon_dua'],
                      'nama_satuan_kerja_eselon_3' => $item['nama_satuan_kerja_eselon_3'],
                  ]
              );
          DB::commit();
          });
          return response()->json(['message' => 'Eselon Tiga has been created or updated successfully'], 201);
        }catch(\Illuminate\Database\QueryException $ex) {
            DB::rollBack();
            return response()->json(['error' => 'An error occurred creating data: id eselon not found'], 400);
        }catch(\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'An error occurred while creating data: ' . $e->getMessage()], 400);
        }
      }

    /**
     * add fungsi
     * 
     * @param Fungsi $fungsi
     */
    public function fungsi(Request $request, Fungsi $fungsi) {
        try {
          DB::beginTransaction();   
          $data = collect($request->repeater)->map(function ($item) use ($fungsi) {
              $fungsi::updateOrCreate(
                  [
                      'id' => $item['id'] ?? null,
                  ],
                  [
                      'id_eselon_tiga' => $item['id_eselon_tiga'],
                      'nama_fungsi' => $item['nama_fungsi'],
                  ]
              );
          DB::commit();
          });
          return response()->json(['message' => 'fungsi has been created or updated successfully'], 201);
        } catch(\Illuminate\Database\QueryException $ex) {
            DB::rollBack();
            return response()->json(['error' => 'An error occurred creating data: id eselon not found'], 400);
        } catch(\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'An error occurred while creating data: ' . $e->getMessage()], 400);
        }
    }
    
    /**
     * get data eselon & fungsi
     * 
     * @param Request $request
     * @param EselonSatu $eselonSatu
     * @param EselonDua  $eselonDua
     * @param EselonTiga $eselonTiga
     * @param Fungsi $fungsi
     */
    public function getEselonFungsi(Request $request, EselonSatu $eselonSatu, EselonDua  $eselonDua, EselonTiga $eselonTiga, Fungsi $fungsi) {
        try {
            $data = [];
            
            if($request->filter == "eselonSatu") {
                $data = $eselonSatu->get();
            } else if ($request->filter == "eselonDua") {
                $data = [
                    'eselonDua' => $eselonDua::with('eselon')->get(),
                    'eselonSatu' => $eselonSatu->get()
                ];
            } else if ($request->filter == "eselonTiga") {
                $data = [
                    'eselonTiga' => $eselonTiga::with('eselons_dua')->get(),
                    'eselonDua' => $eselonDua->get()
                ];
            } else if ($request->filter == "fungsi") {
                $data = [
                    'fungsi' => $fungsi::with('eselons_tiga')->get(),
                    'eselonTiga' => $eselonTiga->get()
                ];
            }
            return new DataEselonFungsiResource($data);
        } catch (\Illuminate\Database\QueryException $ex) {
            DB::rollBack();
            return response()->json(['error' => 'An error occurred while get data: '. $ex->getMessage()], 400);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'An error occurred while : ' . $e->getMessage()], 400);
        }
    }



}
