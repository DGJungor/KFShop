<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Admin\Good;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Input;


class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     * 首页展示
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataObj = Good::paginate(6);
        $state = ['0'=>'下架','1'=>'在售'];
        return view('admin.goods.index', compact(['dataObj','state']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataObj = \DB::table('data_types')->where('pid','0')->get();
        return view('admin.goods.create', compact('dataObj'));
    }

    /**
     * Store a newly created resource in storage.
     * //处理商品添加和文件上传
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->file_detail);
        if ($request->isMethod('post')) {
            $file = $request->file('picname');
            if ( $file->isValid() ) {
            // 文件是否上传成功
            // 获取文件相关信息
            //     $originalName = $file->getClientOriginalName(); // 文件原名
                $ext = $file->getClientOriginalExtension();     // 扩展名
            //     $realPath = $file->getRealPath();   //临时文件的绝对路径
            //     $type = $file->getClientMimeType();     // image/jpeg
                $filename = date('Y-m-d-H-i-s') . '-' . uniqid() .'.'. $ext;
                Image::make( Input::file('picname'))->save('uploads/goods/'.$filename)
                                                    ->resize(130, 130)->save('uploads/goods/m'.$filename)
                                                    ->resize(359, 351)->save('uploads/goods/xl_'.$filename);

                if($request->other>0){
                    $typeid = $request->other;
                } elseif ($request->five>0) {
                    $typeid = $request->five;
                } elseif ($request->four>0) {
                    $typeid = $request->four;
                } elseif ($request->three>0) {
                    $typeid = $request->three;
                } elseif ($request->tow>0) {
                    $typeid = $request->tow;
                } elseif ($request->typeid>0) {
                    $typeid = $request->typeid;
                }

                $row = \DB::table('data_goods')->insertGetId([
                    'goodname'=>$request->goodname,
                    'typeid' =>$typeid,
                    'buy'=>$request->buy,
                    'brand'=>$request->brand,
                    'price'=>$request->price,
                    'inventory'=>$request->inventory,
                    'picname'=>$filename,
                    'suit'=>$request->suit,
                    'makein'=>$request->makein,
                    'state'=>$request->state,
                ]);

                if (!empty($row)) {
                    $row = \DB::table('data_goods_details')->insertGetId([
                        'goods_id' => $row,
                        'picname' => implode(',' , $request->file_detail),
                        'details' => $request->describe,

                    ]);
                   return redirect('/admin/goods')->with(['success' => '添加商品成功！']);

                }
                // endif 文件上传没成功
            } else {

                return back()->with(['success' => '添加失败！,上传图片出错']);
            }
            //end if 不是post请求
        } else{
            return back()->with(['success' => '添加失败！,请求方式异常']);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dataObj = Good::find($id);
        $listObj = \DB::table('data_goods_details')->where('goods_id', $id)->get();
        // dd($dataObj->picname);
        $listObj[0]->picname = explode(',', $listObj[0]->picname);
        // dd($listObj[0]);
        return view('admin.goods.show', compact('dataObj', 'listObj'));
    }

    /**
     * Show the form for editing the specified resource.
     * 表单视图
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dataObj = Good::find($id);
        // dd($dataObj);
        return view('admin.goods.edit', compact('dataObj'));
    }

    /**
     * Update the specified resource in storage.
     * 修改数据
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
//        dd($request->all());
        if (Good::where('id','=',$id)->update([
            'goodname'=>$request->goodname,
            'typeid' =>$request->typeid,
            'buy'=>$request->buy,
            'price'=>$request->price,
            'inventory'=>$request->inventory,
            'brand'=>$request->brand,
            'suit'=>$request->suit,
            'makein'=>$request->makein,
            'state'=>$request->state,
            ]))
        {
            return redirect('/admin/goods')->with(['success' => '修改成功！']);
        } else {
            return back()->with(['success' => '修改失败！']);
        }
    }

    /**
     * Remove the specified resource from storage.
     * 删除操作
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Good::destroy($id)){
            return redirect('/admin/goods')->with(['success' => '删除成功！']);
        } else{
            return back()->with(['success' => '删除失败']);
        }

    }

    /**
     * ajax的请求操作
     *
     */
    public function ajax(Request $request)
    {
        $pid = $request->pid;
        $dataObj = \DB::table('data_types')->where('pid', $pid )->get();
        return json_encode($dataObj);
    }

    /**
     *
     * 多图片上传处理
     */
    public function upload(Request $request)
    {
        $file = $request->file('Filedata');
        $ext = $file->getClientOriginalExtension();
        $filename = date('Y-m-d-H-i-s') . '-' . uniqid() . '.' . $ext;
        //裁剪多张上传的图片
        $img  = Image::make(Input::file('Filedata'))->save('uploads/goods/'.$filename);
        // $img = Image::make('public/')->resize(300, 200);
        return $filename;
        // return $filename;
    }
}
