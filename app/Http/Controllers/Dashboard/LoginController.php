<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function index()
    {
        return view('dashboard.login', [
            'title' => 'Log-In'
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'

        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'email' => 'Login Gagal',
        ])->onlyInput('email');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
