<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerificationEmail;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;
use App\Http\Controllers\UserActivityController;

class LoginController extends Controller
{
    public function indexlogin()
    {
        return view('login.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            UserActivityController::logActivityStatic(Auth::id(), 'User telah Login', 'Online');
            Alert::success('Login Berhasil', 'Selamat datang kembali!');
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'Kombinasi email dan password tidak cocok.',
        ]);
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        UserActivityController::logActivityStatic($user->id, 'User telah registrasi', 'Online');
        Alert::success('Registrasi Berhasil', 'Silakan login untuk melanjutkan');

        return redirect()->route('login');
    }

    public function logout()
    {
        UserActivityController::logActivityStatic(Auth::id(), 'User telah Logout', 'Offline');
        Auth::logout();
        return redirect()->route('userpage');
    }
}

