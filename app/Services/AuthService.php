<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;

class AuthService {
    public function login($credentials)
    {
        if(!Auth::attempt($credentials))
        {
            return false;
        }

        return true;
    }

    public function logout()
    {
        Auth::logout();
    }
}
