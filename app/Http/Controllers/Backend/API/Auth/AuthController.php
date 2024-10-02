<?php

namespace App\Http\Controllers\Backend\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\UserRegisterRequest;
use App\Http\Resources\Auth\UserRegisterResource;
use App\Http\Resources\Auth\AuthResource;
use App\Http\Requests\Auth\UserLoginRequest;
use App\Http\Resources\Auth\UserAccountResource;
use App\Http\Resources\Auth\UserRolesResource;
use Illuminate\Http\Request;
use App\Models\User; 
use App\Models\Admin;
use App\Jobs\SendEmailJob;
use Illuminate\Support\Facades\DB;
use App\Models\Role;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\Backend\Admin\DataEselonFungsiResource;
use App\Models\EselonSatu;
use App\Models\EselonDua;
use App\Models\EselonTiga;
use App\Models\Fungsi;

class AuthController extends Controller
{
    /**
     * function register user
     * 
     * @param UserRegisterRequest $request
     * @param User $user
     * 
     *  */    
    public function register(UserRegisterRequest $request, User $user) {
    
        try {
            DB::beginTransaction();
            if (empty($request->id_satuan_kerja_eselon_1) && empty($request->id_satuan_kerja_eselon_2) && empty($request->id_satuan_kerja_eselon_3)) {
                return response()->json(['error' => 'An error occurred creating account: ' . $ex->getMessage() ], 400);
            }

            $user = $user->create($request->validated());
            
            if($image_profiles = $request->image_profile) {
                foreach ($image_profiles as $image_profile) {
                    $user->clearMediaCollection('image_profile');
                    $user->addMedia($image_profile)->toMediaCollection('image_profile');
                }
            }

            if(isset($request->roles)) {
                $user->roles()->attach($request->roles);
            }

            $admin = Admin::first();
            if ($user) {
                $postMail = [
                    'email' => [$admin->email],
                    'title' => 'New User Has Been Registration',
                    'status' => 'auth',
                    'body' => $user,
                ];
            }
            dispatch(new SendEmailJob($postMail));
            DB::commit();
            return new UserRegisterResource($user);
        } catch (\Illuminate\Database\QueryException $ex) {
            DB::rollBack();
            return response()->json(['error' => 'An error occurred creating account: ' . $ex->getMessage() ], 400);
        }  catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'An error occurred while creating account: ' . $e->getMessage()], 404);
        }
    }

    /**
     * function get roles
     * 
     * @param Role $role
     */
    public function getRoles(Role $role) {
        return $role->all();
    }

    /**
     * 
     * function get user access
     * 
     * @param Request $request
     * @param User $user
     */
    public function getUserAccount(Request $request, User $user) {
        $user = $request->user();
        $role = $request->user()->currentAccessToken()->abilities;
        $role = explode(':', $role[0])[1] ?? "";
        $user["dataRole"] = [];
        if ($role == "user") {
            $user["dataRole"] = $user::find($user->id)->roles;
            $user["id"] = $user->id;
        }
        $user["role"] = $role;
        return new UserAccountResource($user);
    }

    /**
     * function login
     * 
     * @param UserLoginRequest $request
     * 
     */
    public function login(UserLoginRequest $request) {
        
        $user = User::where('email', $request->email)->first();
        if($user == null) {
            throw ValidationException::withMessages([
                'email' => ['User Email not found'],
            ]);
        }
        if($user->exists() && $user->is_verified == 0) {
            throw ValidationException::withMessages([
                'email' => ['Your account has not been verified please check your email is verified'],
            ]);
        }

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect'],
            ]);
        }
        $user->role = "user";
        
        return new AuthResource($user);
    }

    /**
     * Get data Eselon
     * 
     * @param EselonSatu $eselonSatu
     */
    public function getEselon(EselonSatu $eselonSatu) {
        return DataEselonFungsiResource::collection($eselonSatu->all());
    }

    /**
     * get Data eselon dua
     * 
     * @param Request $request
     * @param EselonDua $eselonDua
     */
    public function getEselonDua(Request $request, EselonDua $eselonDua) {
        return DataEselonFungsiResource::collection($eselonDua::where('id_eselon_satu', $request->id_eselon_satu)->get() ?? null);
    }

    /**
     * get Data eselon tiga
     * 
     * @param Request $request
     * @param EselonTiga $eselonTiga
     */
    public function getEselonTiga(Request $request, EselonTiga $eselonTiga) {
        return DataEselonFungsiResource::collection($eselonTiga::where('id_eselon_dua', $request->id_eselon_dua)->get() ?? null);
    }

    /**
     * get Data eselon tiga
     * 
     * @param Request $request
     * @param Fungsi $fungsi
     */
    public function getFungsi(Request $request, Fungsi $fungsi) {
        return DataEselonFungsiResource::collection($fungsi::where('id_eselon_tiga', $request->id_eselon_tiga)->get() ?? null);
    }

    /**
     * get roles account
     * 
     * @param Role $role
     * @param User $user
     */
    public function getUsersRoles(Request $request, Role $role, User $user) {
        $users = $user::find($request->user()->id);
        return UserRolesResource::collection($users->roles);
    }

    /**
     * logout function
     * 
     */
    public function destory(Request $request) 
    {
       $user = $request->user();

       $user->tokens()->delete();

       return response()->noContent();
    }
}
