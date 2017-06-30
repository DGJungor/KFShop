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
       

        $dataObj = \DB::table('data_types')->where('pid', '0')->get();
        foreach($dataObj as $data){
            $data->children = \DB::table('data_types')->where('pid', $data->id)->get();
            foreach($data->children as $children){
                $children->grandchild = \DB::table('data_types')->where('pid', $children->id)->get();
            }
        }

        $goodsObj = \DB::table('data_goods')->where('typeid', 3)->get();

        return view('web.index', compact('data', "", ['dataObj', 'goodsObj', 'dataObj', 'res']));

    }

    public function ajax(Request $request)
    {
        $id = $request->pid;
        $goodsObj = \DB::table('data_goods')->where('typeid', $id)->orderBy('buy', 'desc')->get();
        return $goodsObj;
    }

}
