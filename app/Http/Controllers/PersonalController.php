<?php

namespace App\Http\Controllers;

use App\Admin\UserRegister;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

class PersonalController extends Controller
{
    //个人中心首页
    public function index()
    {
        $id = Auth::user()->id;
        $userinfo = UserRegister::find($id)->userInfo[0];
        return view('web.personal.index', $userinfo);
    }

    //
    public function showAddress()
    {
        return view('web.personal.address');
    }
}
