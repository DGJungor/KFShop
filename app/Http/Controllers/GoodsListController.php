<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use App\Admin\Recommend;
use Illuminate\Http\Request;

use App\Http\Requests;

class GoodsListController extends Controller
{
    public function goodsList(Request $request, $id)
    {

        $type=\DB::table('data_types')->where('pid','=', $id)->get();

        if($type){
            $list=\DB::table('data_types')->where('id','=', $id)->get();
//            dd($list);
            $lst=array('1');
//            dd($lst);
            foreach ($type as $val)
            {
                $val->children=\DB::table('data_goods')->where('typeid', '=', $val->id)->get();

                foreach ($val->children as $chil)
                {
                    $goods[]=$chil;


                }
            }

        }else{
            $list=\DB::table('data_types')->where('id', '=', $id)->get();
            $lst=array('2');
            $types = \DB::table('data_goods')->where('typeid', $id)->get();

                foreach($types as $val){
                    $goods[]=$val;
                }

        }

        $recommend=Recommend::paginate(3);


        return view('web.goods.list', compact('goodslist', '', ['type', 'lst','goods', 'list','types', 'recommend']));
    }

    public function ajax(Request $request)
    {
        $id=$request->pid;
        $path=$request->path;
        if($path == 'buys'){

            $datas=\DB::table('data_goods')->where('typeid',$id)->orderBy('buy','asc')->limit(8)->get();

        }
        elseif($path == 'prices'){

            $datas=\DB::table('data_goods')->where('typeid',$id)->orderBy('price','asc')->limit(8)->get();

        }

        return $datas;

    }


}
