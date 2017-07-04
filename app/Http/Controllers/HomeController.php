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

        //获取轮播图和推荐图的数据
        $banner=ShopBanner::paginate(4);
        $banners=Recommend::paginate(4);
        $res = compact("banner", "",["banners"]);

        $dataObj = \DB::table('data_types')->where('pid', '0')->get();
        foreach($dataObj as $data){
            $data->children = \DB::table('data_types')->where('pid', $data->id)->get();
            $data->goods = \DB::table('data_goods')->where('typeid', $data->id)->orderBy('buy', 'desc')->limit(8)->get();
            foreach($data->children as $children){
                $children->grandchild = \DB::table('data_types')->where('pid', $children->id)->get();
            }
        }

        return view('web.index', compact('data', "", ['dataObj', 'dataObj', 'res']));

    }

    public function details(Request $request)
    {
        // $dataObj = \DB::table('data_goods')->where('id', $id)->get();
        return view('web.goods.details');
    }

    public function ajax(Request $request)
    {
        $id = $request->pid;
        $goodsObj = \DB::table('data_goods')->where('typeid', $id)->orderBy('buy', 'desc')->limit(8)->get();
        return $goodsObj;
    }

}
