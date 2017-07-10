<?php

namespace App\Http\Controllers;

use App\Admin\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\MsgResult;


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

            foreach ($goode as $vb){}

            $orde = \DB::table('data_orders_details')->where('id', $val->order_id)->get();

            foreach ($orde as $vs){}

            $usename = \DB::table('data_users_register')->where('id', $val->user_id)->get();

            foreach ($usename as $vz){}
            $val->uname = $vz;
            $val->good = $vb;
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
        $comments = \DB::table('data_orders_details')->where('id', $id)->get();

        foreach ($comments as $value)
        {
            $goodes = \DB::table('data_goods')->where('id', $value->goods_id)->get();
            foreach ($goodes as $vx){}
            $value->good = $vx;
        }
//        dd($value);
        return view('web.comment.create', compact(['value']));

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

        Comment::destroy($id);

        return redirect('user/comment');
    }

    /**
     * Remove the specified resource from storage.
     *ajax插入数据
     *
     * @return \Illuminate\Http\Response
     */
    public  function createComment(Request $request)
    {
        //获取评论所需要的数据
        $goodid = $request->input('good_id', '');
        $userid = $request->input('user_id', '');
        $orderid = $request->input('order_id', '');
        $cargoid = $request->input('cargo_id', '');
        $tyles = $request->input('comment_tyle', '');
        $star = $request->input('star', '');
        $info = $request->input('comment_info', '');

        $msg_result = new MsgResult;

        $commente = new Comment;

        $commente->goods_id = $goodid;
        $commente->user_id = $userid;
        $commente->order_id = $orderid;
        $commente->cargo_id = $cargoid;
        $commente->comment_tyle = $tyles;
        $commente->star = $star;
        $commente->comment_info = $info;
        $commente->save();

//        $msg_result->status = 0;
//        $msg_result->message = '添加成功';
//        return $msg_result->toJson();

    }
}
