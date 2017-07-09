<?php

namespace App\Http\Controllers;

use App\Admin\Friend;
use App\Admin\ShopBanner;
use Illuminate\Http\Request;
use App\Admin\Recommend;
use App\Admin\Good;
use App\Http\Requests;
use Illuminate\Support\Facades\Redis;


class HomeController extends Controller
{
    /**
     * 获取首页数据
     * 循环查询出顶级分类里的子类
     * 每20分钟更新一次首页
     * @return [Obj] [description]
     */
    public function index()
    {


        $key= 'Home';

        if(Redis::exists($key)){
            //根据键名获取键值
            return view('web.index', unserialize( Redis::get($key) ) );

            // dd(Redis::get($key));
        }else{
            $friend=Friend::all();
            $banner=ShopBanner::paginate(4);
            $recommend=Recommend::paginate(4);

            $dataObj = \DB::table('data_types')->where('pid', '0')->get();
            foreach($dataObj as $data){
                $data->children = \DB::table('data_types')->where('pid', $data->id)->get();
                $data->goods = \DB::table('data_goods')->where('typeid', $data->id)->where('state', 0)->orderBy('buy', 'desc')->limit(8)->get();
                foreach($data->children as $children){
                    $children->grandchild = \DB::table('data_types')->where('pid', $children->id)->get();
                }

            }
            $compact = compact('data', 'friend', 'banner', 'recommend', 'dataObj');
            $info =  serialize( $compact );


            // dd(compact('data', 'friend', 'banner', 'recommend', 'dataObj'));
            Redis::setex($key, '86400', $info);
            return view('web.index', $compact);

        }

    }

    /**
     * 获取详情页需要的数据
     * @param  Request $request [description]
     * @param  [type]  $id      [description]
     * @return [type]           [description]
     */
    public function details(Request $request, $id)
    {
        $key = 'details:'.$id;
        if(Redis::exists($key)){
            $dataObj = Redis::get($key);

            // dump(321);
            return view('web.goods.details', unserialize( Redis::get($key) ) );

        }else{
            $dataObj = Good::find($id);
            $listObj = \DB::table('data_goods_details')->where('goods_id', $id)->get();
            // dd($dataObj->picname);
            if($listObj){
                $listObj[0]->listname = explode(',', $listObj[0]->listname);
                $listObj[0]->picname = explode(',', $listObj[0]->picname);
            }


            if($dataObj->buy > 300){
                $compact = compact('dataObj', 'listObj');
                $info = serialize($compact);
                Redis::setex($key, '172800', $info);
            }

            return view('web.goods.details', compact('dataObj', 'listObj'));
        }
    }

    /**
     * ajax请求数据
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function ajax(Request $request)
    {
        $id = $request->pid;
        $goodsObj = \DB::table('data_goods')->where('typeid', $id)->where('state', 0)->orderBy('buy', 'desc')->limit(8)->get();
        return $goodsObj;
    }

    public function clear()
    {
        $key= 'Home';
        Redis::del($key);
        return back();
    }
}
