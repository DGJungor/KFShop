<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin\Recommend;
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

        $recommend=Recommend::paginate(4);

        return view('web.nav.nav', compact(['recommend']));

    }


}
