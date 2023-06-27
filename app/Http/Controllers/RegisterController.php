<?php

namespace App\Http\Controllers;

use App\Models\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        try {
            $validated = $request->validateWithBag('signup_form', [
                'first_name' => 'required|max:45',
                'last_name' => 'required|max:45',
                'email' => 'required|email|max:70',
                'birth_date' => 'required|date',
                'country' => 'required|integer',
                'password' => 'required|min:8|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*#?&]/|max:100',
                'is_hotel_owner' => 'required|boolean'
            ]);
            $user = new User;
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->birth_date = $request->birth_date;
            $user->countries_id_countries = $request->country;
            $user->password = Hash::make($validated["password"]);
            $user->is_hotel_owner = $request->is_hotel_owner;
            $user->save();
            return response()->json(['messages' => 'Udało ci się utworzyć konto. Możesz się teraz zalogować']);
        } catch (\Illuminate\Database\QueryException $ex) {
            return response()->json(['errors' => ["Nie można utworzyć użytkownika"]], 409);
        }
    }
}
