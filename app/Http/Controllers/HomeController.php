<?php

namespace App\Http\Controllers;

use App\Admin\ShopBanner;
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

//        return view('web.index');

        $banner=ShopBanner::paginate(4);
        $banners=Recommend::paginate(4);
        $res = compact("banner", "",["banners"]);
        return view('web.index', ["res"=>$res]);

    }



}
