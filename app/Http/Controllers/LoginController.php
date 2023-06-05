<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class LoginController extends Controller
{
    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validateWithBag('login_form', [
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        try {
            if (!Auth::attempt($credentials)) {
                return back()->withErrors([
                    'email' => 'Podane dane są nieprawidłowe',
                ], 'login_form')->onlyInput('email');
            }
            $request->session()->regenerate();
            return redirect(RouteServiceProvider::HOME);
        } catch (\Illuminate\Database\QueryException $ex) {
            return back()->withErrors(['errors' => "Nie można się zalogować. Spróbuj ponownie później"]);
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
