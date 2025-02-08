<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function postlogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal', $validator->messages());
            return redirect()->back()->withInput();
        }

        $credentials = [
            "username" => $request->username,
            "password" => $request->password
        ];


        if (auth()->attempt($credentials)) {

            Alert::success('success', 'Login Berhasil di lakukan');
            return redirect()->route('dashboard');
        } else {
            Alert::error('Gagal', 'Username / Password salah');
            return redirect()->back()->withInput();
        }

        try {
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                Alert::success('Success', 'Login Berhasil di lakukan');
                return redirect()->intended('dashboard');
            } else {
                Alert::error('Gagal', "email atau password salah");
                return back();
            }
        } catch (\Throwable $th) {
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Alert::success('Success', 'Logout Berhasil di lakukan');
        return redirect()->route('login');
    }
}
