<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use App\Admin\Recommend;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class GoodsListController extends Controller
{
    /**
     *商品列表页
     *
     */
    public function goodsList(Request $request, $id)
    {
        //找到获取的id的对应数据
        $type = \DB::table('data_types')->where('pid','=', $id)->get();
        //判读是否为空数组，执行对应的操作

        if($type){

            $list = \DB::table('data_types')->where('id','=', $id)->get();

            $lst = array('1');

            foreach ($type as $val)
            {

                $val->children = \DB::table('data_goods')->where('typeid', '=', $val->id)->get();

                $did[] = $val->id;
            }

            $goods=\DB::table('data_goods')->whereNotIn('state',[1])->whereIn('typeid',$did)->paginate(12);


        }else{

            $list = \DB::table('data_types')->where('id', '=', $id)->get();

            $lst = array('2');

            $goods = \DB::table('data_goods')->whereNotIn('state',[1])->where('typeid', $id)->paginate(12);

        }

        return view('web.goods.list', compact('goodslist', '', ['lst','goods', 'list']));
    }
    /**
     * ajax排序
     *
     *
     */
    public function ajax(Request $request)
    {
        $id = $request->pid;

        $path = $request->path;

        if($path == 'buys'){

            $datas = \DB::table('data_goods')->where('typeid',$id)->whereNotIn('state',[1])->orderBy('buy','asc')->limit(16)->get();

        }
        elseif($path == 'prices'){

            $datas = \DB::table('data_goods')->where('typeid',$id)->whereNotIn('state',[1])->orderBy('price','asc')->limit(16)->get();

        }

        return $datas;

    }
    /**
     *ajax的推荐图
     *
     */
    public function recom(Request $request)
    {


        $recommend = \DB::table('data_recommend')->limit(3)->get();

        return $recommend;
    }

}
