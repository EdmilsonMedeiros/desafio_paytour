<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthService
{
    public function login(Request $request)
    {
        try{
            $user = User::where('email', $request->email)->first();

            if(!$user || !Hash::check($request->password, $user->password)){
                throw new \Exception('Invalid credentials');
            }

            Auth::login($user);

        } catch (\Exception $e) {
            throw new \Exception('Error logging in: ' . $e->getMessage());
        }

        return $user;
    }
}
