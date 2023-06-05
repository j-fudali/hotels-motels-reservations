<?php

namespace App\Http\Controllers;

use App\Models\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $validated = $request->validateWithBag('signup_form', [
            'first_name' => 'required|max:45',
            'last_name' => 'required|max:45',
            'email' => 'required|email|max:70',
            'birth_date' => 'required|date',
            'country' => 'required|max:45',
            'password' => 'required|min:8|max:100',
            'is_hotel_owner' => 'required|boolean'
        ]);
        try {
            $user = new User;
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->birth_date = $request->birth_date;
            $user->country = $request->country;
            $user->password = Hash::make($validated["password"]);
            $user->is_hotel_owner = $request->is_hotel_owner;
            $user->save();
        } catch (\Illuminate\Database\QueryException $ex) {
            return back()->withErrors(['errors' => "Nie można utworzyć użytkownika"]);
        }
        return redirect('/');
    }
}
