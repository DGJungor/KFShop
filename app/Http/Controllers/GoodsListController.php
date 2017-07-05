<?php

namespace App\Http\Controllers;

use App\Admin\Recommend;
use Illuminate\Http\Request;

use App\Http\Requests;

class GoodsListController extends Controller
{
    public function goodsList(Request $request, $id)
    {
       $list=$request->all();
       foreach ($list as $key=>$ve);

        $types=\DB::table('data_types')->where('id','=', $key)->get();

        $type=\DB::table('data_types')->where('id','=', $id)->get();

        foreach($types as $val){
            $val->children = \DB::table('data_types')->where('pid', $val->id)->get();

            foreach($val->children as $children){

            }
        }
        $recommend=Recommend::paginate(3);
        $goods = \DB::table('data_goods')->where('typeid', $id)->orderBy('buy', 'desc')->paginate(8);

        return view('web.goods.list', compact('goodslist', '', ['type', 'goods', 'children','types', 'recommend']));
}
}
