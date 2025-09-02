<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
use App\Services\AuthService;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login()
    {
        if(Auth::check()){
            return redirect()->route('dashboard');
        }

        return Inertia::render('Auth/Login');
    }

    public function loginSubmit(LoginRequest $request)
    {
        try{
            $user = $this->authService->login($request);

            return redirect()->route('dashboard')->with('success', 'Login realizado com sucesso.');
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', $e->getMessage());
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
