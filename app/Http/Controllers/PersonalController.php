<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PersonalController extends Controller
{
    //个人中心首页
    public function index()
    {
        return view('web.personal.index');
    }
}
