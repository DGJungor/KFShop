<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class RegisterController extends Controller
{
    public function index()
    {
        return view('web.register');
    }

    //
    public function register(Request $request)
    {
        //
    }
}
