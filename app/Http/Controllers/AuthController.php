<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login()
    {
        $data = [
            'title' => "Login",
        ];

        return view('menus.auth.login', $data);
    }

    public function attempt_login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:8'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->with("error", "Email / Password Tidak Memenuhi Syarat!")->withInput();
        }

        $credentials = $validator->validate();
        if (User::where('email', $credentials['email'])->exists()) {
            if (Auth::attempt($credentials)) {
                return redirect()->intended(RouteServiceProvider::HOME)->with('success', "Berhasil Login");
            }
            return redirect()->back()->with('error', "Email / Password tidak cocok! coba lagi!");
        }

        return redirect()->back()->with("error", "Email / Password tidak cocok! coba lagi!");
    }

    public function logout()
    {
        session()->flush();
        Auth::logout();
        return redirect()->route('auth.login')->with("success", "Anda Telah Logout!");
    }
}
