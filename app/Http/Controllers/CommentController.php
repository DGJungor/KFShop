<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;



class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $uid = Auth::id();

        //按用户id获取评论的内容
        $comment = \DB::table('data_goods_comment')->where('user_id', $uid)->get();

        $tyle = ['0'=>'匿名评论'];

        $stor = ['1'=>'差评', '2'=>'中评', '3'=>'好评'];

        foreach ($comment as $val){

            $goode = \DB::table('data_goods')->where('id', $val->goods_id)->get();
            foreach ($goode as $v){}
            $orde = \DB::table('data_orders_details')->where('id', $val->order_id)->get();
            foreach ($orde as $vs){}
            $val->good = $v;
            $val->orde = $vs;
         }

        return view('web.comment.index', compact(['comment', 'tyle', 'stor']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {





    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


        return view('web.comment.create');

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

    public  function createComment(Request $request)
    {
        dd($request->all());

    }
}
