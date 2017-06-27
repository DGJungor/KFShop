<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class HomeController extends Controller
{
    /**
     * 循环查询出顶级分类里的子类
     * @return [Obj] [description]
     */
    public function index()
    {
        return view('web.index');
    }


}
