<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function getUserToken(Request $request) {
        $user = Socialite::driver('steam')->user();
        $token = $user->token;
        $refreshToken = $user->refreshToken;
        $expiresIn = $user->expiresIn;

        $request->session()->put('user', $user);

        return redirect()->route('user_profile');
    }
}
