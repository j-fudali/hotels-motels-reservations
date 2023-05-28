<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function register(Request $request)
    {
        $validated_register = $request->validate([
            'first_name' => 'required|max:45',
            'last_name' => 'required|max:45',
            'email' => 'required|email|max:70',
            'birth_date' => 'required|date',
            'country' => 'required|max:45',
            'password' => 'required|min:8|max:100',
            'is_hotel_owner' => 'required|boolean'
        ]);
        $user_to_save = $request->merge(['password', Hash::make($validated_register["password"])]);
        DB::table('users')->insert($user_to_save->all());
        return redirect('dashboard');
    }
    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'Podane dane są nieprawidłowe',
        ])->onlyInput('email');
    }
}
