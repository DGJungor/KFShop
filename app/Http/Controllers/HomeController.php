<?php

namespace App\Http\Controllers;

use App\Admin\Friend;
use App\Admin\ShopBanner;
use Illuminate\Http\Request;
use App\Admin\Recommend;
use App\Admin\Good;
use App\Http\Requests;

class HomeController extends Controller
{
    /**
     * 循环查询出顶级分类里的子类
     * @return [Obj] [description]
     */
    public function index()
    {
        $banner = ShopBanner::paginate(4);

        $recommend = Recommend::paginate(4);

        $dataObj = \DB::table('data_types')->where('pid', '0')->get();
        foreach($dataObj as $data){
            $data->children = \DB::table('data_types')->where('pid', $data->id)->get();
            $data->goods = \DB::table('data_goods')->where('typeid', $data->id)->orderBy('buy', 'desc')->limit(8)->get();
            foreach($data->children as $children){
                $children->grandchild = \DB::table('data_types')->where('pid', $children->id)->get();

            }

        }
        return view('web.index', compact('data', "", ['dataObj', 'dataObj', 'res', 'banner', 'recommend']));

    }

    public function details(Request $request, $id)
    {
        $dataObj = Good::find($id);
        $listObj = \DB::table('data_goods_details')->where('goods_id', $id)->get();
        // dd($dataObj->picname);
        $listObj[0]->listname = explode(',', $listObj[0]->listname);
        $listObj[0]->picname = explode(',', $listObj[0]->picname);
        // dd($listObj[0]);
        return view('web.goods.details', compact('dataObj', 'listObj'));
    }

    public function ajax(Request $request)
    {
        $id = $request->pid;
        $goodsObj = \DB::table('data_goods')->where('typeid', $id)->orderBy('buy', 'desc')->limit(8)->get();
        return $goodsObj;
    }

}
