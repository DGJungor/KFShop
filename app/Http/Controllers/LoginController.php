<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class LoginController extends Controller
{
    //登录页面
    public function index()
    {
        if (\Auth::check()) {
            return redirect("/pensonal");
        }

        return view('web.login');
    }

    public function login(Request $request)
    {
        $this->validate($request);
    }

}
