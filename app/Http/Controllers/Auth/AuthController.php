<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginPage()
    {
        return view('auth.login');
    }

    public function submitLogin(LoginUserRequest $request)
    {
        if(!Auth::attempt($request->only('email', 'password')))
        {
            return redirect()->back()->with('error', 'Credential error!');
        }

        return redirect()->route('blogs.index');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
