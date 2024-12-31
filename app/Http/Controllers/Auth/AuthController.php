<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use App\Services\AuthService;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    private $authService;
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function loginPage()
    {
        return view('auth.login');
    }

    public function submitLogin(LoginUserRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if ($this->authService->login($credentials)) {
            return redirect()->route('blogs.index');
        }
        return redirect()->back()->with('error', 'Credential error!');

    }

    public function logout()
    {
        $this->authService->logout();
        return redirect()->route('login');
    }
}
