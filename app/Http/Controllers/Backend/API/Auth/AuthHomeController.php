<?php

namespace App\Http\Controllers\Backend\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\UserHomeRegisterRequest;
use App\Http\Requests\Auth\UserHomeLoginRequest;
use App\Http\Resources\Auth\UserRegisterResource;
use App\Http\Resources\Auth\AuthResource;
use App\Models\UserHome;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

class AuthHomeController extends Controller
{
    /**
     * function login
     * 
     * @param UserHomeLoginRequest $request
     * 
     */
    public function login(UserHomeLoginRequest $request) {
        
        $user = UserHome::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect'],
            ]);
        }
        $user->role = "userHome";
        
        return new AuthResource($user);
    }
}
