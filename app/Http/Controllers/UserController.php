<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\View;

class UserController extends Controller
{
    public function index()
    {
        return View::make('dashboard.profile');
    }
    // public function update(User )
}
