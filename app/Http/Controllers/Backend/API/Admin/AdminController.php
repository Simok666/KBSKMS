<?php

namespace App\Http\Controllers\Backend\API\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\Backend\Admin\UserResources;
use App\Http\Requests\Backend\Admin\AdminVerifiedRequest;
use App\Http\Requests\Backend\Admin\KategoriRequest;
use App\Models\User;
use App\Models\EselonSatu;
use App\Models\EselonDua;
use App\Models\EselonTiga;
use App\Models\Fungsi;
use App\Jobs\SendEmailJob;
use App\Models\Contributor;
use App\Http\Resources\Backend\Admin\DataEselonFungsiResource;
use DB;
use Symfony\Component\HttpFoundation\Response as HttpResponse;
use App\Models\Kategori;
use App\Http\Resources\Backend\Admin\KategoriResources;
use App\Models\BadgeActivity;
use App\Models\BadgeContributor;
use App\Models\BadgeVerificator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Log;

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

    /**
     * get all data from kategori
     * 
     * @param Kategori $kategori
     */
    public function getKategori(Kategori $kategori) {
        return KategoriResources::collection(
            Kategori::when(request()->filled("id"), function ($query){
                $query->where('id', request("id"));
            })->paginate($request->limit ?? "10")
        );
    }

    /**
     * add or update data kategori
     * 
     * @param KategoriRequest $request
     * @param Kategori $kategori
     */
    public function kategori(Request $request, Kategori $kategori) {
        try {
          DB::beginTransaction();   
          $data = collect($request->repeater)->map(function ($item) use ($kategori) {
            
              $kategori = $kategori::updateOrCreate(
                  [
                      'id' => $item['id'] ?? null,
                  ],
                  [
                      'nama_kategori' => $item['nama_kategori'],
                      'dekskripsi' => $item['dekskripsi'],
                  ]
              );

              if($image_icons = $item['icon']) {
                    foreach ($image_icons as $image_icon) {
                        $kategori->clearMediaCollection('icon');
                        $kategori->addMedia($image_icon)->toMediaCollection('icon');
                    }
                }

          DB::commit();
          });
          return response()->json(['message' => 'Kategori has been created or updated successfully'], 201);
        } catch(\Illuminate\Database\QueryException $ex) {
            DB::rollBack();
            return response()->json(['error' => 'An error occurred creating data: ' . $ex->getMessage()], 400);
        } catch(\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'An error occurred while creating data: ' . $e->getMessage()], 400);
        }
    }

    /**
     * function check badge kontributor per user
     * 
     * @param User $user
     */
    public function checkBadgeContributor(User $user) {
        try {
            $dataUser = $user::withCount(['userKonten' => function (Builder $query) {
                $query->where('status', 'publish');
            }])->get();

            $badgeContributor = 1;
            $data = collect($dataUser)->map(function ($item) {
                $publishContenCount = $item['user_konten_count'];
                    
                    DB::beginTransaction(); 

                if($publishContenCount >= 1 && $publishContenCount <= 5) {
                    $badgeContributor = 1;
                } elseif ($publishContenCount >= 6 && $publishContenCount <= 10) {
                    $badgeContributor = 2;
                } elseif ($publishContenCount >= 11 && $publishContenCount <= 20) {
                    $badgeContributor = 3;
                } elseif ($publishContenCount >= 21) {
                    $badgeContributor = 4;
                }
                    
                $updataData = User::where('id', $item['id'])->update([
                    'badge_contributor_id' => $badgeContributor,  
                ]);

                DB::commit();
            });
            Log::info('Success update BadgeContributor');
        } catch(\Illuminate\Database\QueryException $ex) {
            DB::rollBack();
            Log::info('Error when update BadgeContributor '. $ex->getMessage());
        } catch(\Exception $e) {
            DB::rollBack();
            Log::info('Error when update BadgeContributor '. $e->getMessage());
        }
    }

    /**
     * function check badge verificator per user
     * 
     * @param User $user
     */
    public function checkBadgeVerificator(User $user) {
        try {
            $dataUser = $user::withCount(['userVerifikator' => function (Builder $query) {
            }])->get();

            $badgeVerificator = 1;
            $data = collect($dataUser)->map(function ($item) {
                $publishContenCount = $item['user_verifikator_count'];
                    
                DB::beginTransaction(); 

                if($publishContenCount >= 1 && $publishContenCount <= 5) {
                    $badgeVerificator = 1;
                } elseif ($publishContenCount >= 6 && $publishContenCount <= 10) {
                    $badgeVerificator = 2;
                } elseif ($publishContenCount >= 11 && $publishContenCount <= 20) {
                    $badgeVerificator = 3;
                } elseif ($publishContenCount >= 21) {
                    $badgeVerificator = 4;
                }
                    
                $updataData = User::where('id', $item['id'])->update([
                    'badge_verificator_id' => $badgeContributor,  
                ]);

                DB::commit();
            });
            Log::info('Success update BadgeVerificator');
        } catch(\Illuminate\Database\QueryException $ex) {
            DB::rollBack();
            Log::info('Error when update BadgeVerificator '. $ex->getMessage());
        } catch(\Exception $e) {
            DB::rollBack();
            Log::info('Error when update BadgeVerificator '. $e->getMessage());
        }
    }

    /**
     * function check badge verificator per user
     * 
     * @param User $user
     */
    public function checkBadgeActivity(User $user) {
        try {
            $dataUser = User::with(['ratings', 'likes', 'comments', 'shares'])->get();
            $badgeActivity = 1;
            $data = collect($dataUser)->map(function ($item) {
                
                $contributorIds = collect([
                    $item['ratings']->pluck('contributor_id'),
                    $item['likes']->pluck('contributor_id'),
                    $item['comments']->pluck('contributor_id'),
                    $item['shares']->pluck('contributor_id')
                ])->flatten()->unique(); 

                $uniqueContributorCount = $contributorIds->count();
                    
                DB::beginTransaction(); 

                if($uniqueContributorCount >= 1 && $uniqueContributorCount <= 5) {
                    $badgeActivity = 1;
                } elseif ($uniqueContributorCount >= 6 && $uniqueContributorCount <= 10) {
                    $badgeActivity = 2;
                } elseif ($uniqueContributorCount >= 11 && $uniqueContributorCount <= 20) {
                    $badgeActivity = 3;
                } elseif ($uniqueContributorCount >= 21) {
                    $badgeActivity = 4;
                }
                    
                $updataData = User::where('id', $item['id'])->update([
                    'badge_activity_id' => $badgeActivity,  
                ]);

                DB::commit();
            });
            Log::info('Success update BadgeActivity');
        } catch(\Illuminate\Database\QueryException $ex) {
            DB::rollBack();
            Log::info('Error when update BadgeActivity '. $ex->getMessage());
        } catch(\Exception $e) {
            DB::rollBack();
            Log::info('Error when update BadgeActivity '. $e->getMessage());
        }
    }



}
