<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'email' => ['bail', 'required', 'email:filter'],
            'password' => ['bail', 'required', 'max:200']
        ]);

        if(!Auth::attempt($request->only(['email', 'password']))){
            return response()->json([
                "status" => true,
                "message" => "Invalid credentials"
            ], 401);
        }

        $user = $request->user();
        $token = $user->createToken($user->email)->plainTextToken;
        
        return response()->json([
            'status' => true,
            'message' => "Login Successful",
            'token' => $token
        ]);
    }
}
