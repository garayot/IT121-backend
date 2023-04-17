<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /** @Route 
     * Login Using specified user
     * 
    */
    
    public function login(UserRequest $request)
    {
        
        $user = User::where('email', $request->email)->first();
     
        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $response = [
            'user'  => $user,
            'token' =>  $user->createToken($request->email)->plainTextToken
        ];
     
        return $response;
    }

    public function logout(UserRequest $request)
    {
        //return User::findOrFail($id);
        return false;

    }

}
