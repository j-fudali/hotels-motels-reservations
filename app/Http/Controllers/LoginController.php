<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        try {
            if (!Auth::attempt($credentials)) {
                return response()->json(['errors' => ['Podane dane są nieprawidłowe']], 401);
            }
            $request->session()->regenerate();
            return response()->json(['redirect' => url(RouteServiceProvider::HOME)]);
        } catch (\Illuminate\Database\QueryException $ex) {
            return response()->json(['errors' => ["Nie można się zalogować. Spróbuj ponownie później"]], 401);
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
