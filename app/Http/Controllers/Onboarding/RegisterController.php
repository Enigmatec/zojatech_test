<?php

namespace App\Http\Controllers\Onboarding;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(User $user, RegisterRequest $request)
    {
        $user = $user->create($request->validated());
        $token = $user->createToken($user->email)->plainTextToken;

        return response()->json([
            'status' => true,
            'message' => "Registration Successful",
            'token' => $token
        ], 201);
    }
}
