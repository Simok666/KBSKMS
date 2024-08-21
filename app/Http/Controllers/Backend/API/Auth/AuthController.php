<?php

namespace App\Http\Controllers\Backend\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\UserRegisterRequest;
use App\Http\Resources\Auth\UserRegisterResource;
use App\Http\Resources\Auth\AuthResource;
use App\Http\Requests\Auth\UserLoginRequest;
use Illuminate\Http\Request;
use App\Models\User; 
use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use App\Models\Role;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

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
            $user = $user->create($request->validated());

            if(isset($request->roles)) {
                $user->roles()->attach($request->roles);
            }

            DB::commit();

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
     * function login
     * 
     * @param UserLoginRequest $request
     * 
     */
    public function login(UserLoginRequest $request) {
        
        $user = User::where('email', $request->email)->first();
        
        if (!$user || !Hash::check($request->password, $user->password) || $user->is_verified == 0 ) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect or Your account has not been verified'],
            ]);
        }
        $user->role = "user";
        
        return new AuthResource($user);
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
