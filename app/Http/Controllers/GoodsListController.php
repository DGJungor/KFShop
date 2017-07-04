<?php

namespace App\Http\Controllers;

use App\Admin\Type;
use Illuminate\Http\Request;
use App\Http\Requests;

class GoodsListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        //获取商品分类的数据
//        $order = \DB::table('data_types')->where('pid', '0')->get();
//
//        foreach($order as $row){
//            $row->children = \DB::table('data_types')->where('pid', $row->id)->get();
//            foreach($row->children as $children){
//                $children->grandchild = \DB::table('data_types')->where('pid', $children->id)->get();
//            }
//        }
//
//        $goodsObj = \DB::table('data_goods')->where('typeid', 3)->get();
//
//        return view('web.goods_list', compact('row', '', ['order', 'good']));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

            $order = \DB::table('data_types')->where('id', $id)->get();
//            dd($order);
            foreach ($order as $row){
                    $row->children = \DB::table('data_types')->where('pid', $row->id)->get();
//                    dump($row->children);
                    foreach($row->children as $children){
                        $children->grandchild = \DB::table('data_types')->where('pid', $children->id)->get();
                    }
            }

            $goods=\DB::table('data_goods')->get();



            return view('web.goods.list', compact('row', '', ['order', 'goods']));




    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
