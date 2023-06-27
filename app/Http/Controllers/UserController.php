<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class UserController extends Controller
{
    public function index()
    {
        return View::make('dashboard.profile');
    }
    public function update(Request $request)
    {
        $request->validate(['birth_date' => 'required|date']);
        $request->user()->update(['birth_date' => $request['birth_date']]);
        return response()->json(['messages' => ['Udało się zaktualizować użytkownika']]);
    }
}
