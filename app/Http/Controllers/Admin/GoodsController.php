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
        $dataObj = Good::orderBy('id', 'desc')->paginate(6);
        $state = ['0'=>'在售','1'=>'下架'];
        return view('admin.goods.index', compact(['dataObj','state']));
    }

    /**
     * 搜索
     */
    public function soso(Request $request)
    {
        $dataObj = Good::where('goodname', 'like', '%'.$request->soso.'%')->orderBy('id', 'desc')->paginate(6);
        // dd($dataObj);
        $state = ['0'=>'在售','1'=>'下架'];
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
                Image::make( Input::file('picname'))->save('uploads/goods/'.$filename);

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
                \DB::beginTransaction();

                $row = Good::insertGetId([
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
                    'created_at'=>date('Y-m-d-H-i-s',time()),
                ]);
                if($row < 0){
                    \DB::rollBack();
                }
                if($request->file || $request->file_detail  ){
                    $filepic = @implode(',' , $request->file);
                    $file_detail = @implode(',' , $request->file_detail);

                    $num = \DB::table('data_goods_details')->insert([
                        'goods_id' => $row,
                        'listname' => $filepic,
                        'picname' => $file_detail,
                        'details' => $request->describe,
                    ]);
                }else{
                    $num = \DB::table('data_goods_details')->insert([
                        'goods_id' => $row,
                        'listname' => $request->file,
                        'picname' =>$request->file_detail,
                        'details' => $request->describe,
                    ]);
                }

                if($num < 0){
                    \DB::rollBack();
                }
                \DB::commit();

                if ($num > 0) {

                   return redirect('/admin/goods')->with(['success' => '添加商品成功！']);

                }else{

                    return back()->with(['success' => '添加失败！']);

                }
                // endif 文件上传没成功
            } else {

                return back()->with(['success' => '添加失败！上传图片出错']);
            }
            //end if 不是post请求
        } else{
            return back()->with(['success' => '添加失败！,请求方式异常']);
        }
    }


    /**
     * Display the specified resource.
     * 详情页
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dataObj = Good::find($id);
        $listObj = \DB::table('data_goods_details')->where('goods_id', $id)->get();
        // dd($dataObj->picname);
        $listObj[0]->picname = explode(',', $listObj[0]->picname);
        $listObj[0]->listname = explode(',', $listObj[0]->listname);
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
        $listObj = \DB::table('data_goods_details')->where('goods_id', $id)->get();
        // dd($dataObj->picname);
        $listObj[0]->picname = explode(',', $listObj[0]->picname);
        $listObj[0]->listname = explode(',', $listObj[0]->listname);
        // dd($listObj[0]);
        return view('admin.goods.edit', compact('dataObj', 'listObj'));
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
        $file = $request->file('picname');
        if ( $file ) {
        // 文件是否上传成功
        // 获取文件相关信息
        //     $originalName = $file->getClientOriginalName(); // 文件原名
            $ext = $file->getClientOriginalExtension();     // 扩展名
        //     $realPath = $file->getRealPath();   //临时文件的绝对路径
        //     $type = $file->getClientMimeType();     // image/jpeg
            $filename = date('Y-m-d-H-i-s') . '-' . uniqid() .'.'. $ext;
            Image::make( Input::file('picname'))->save('uploads/goods/'.$filename);
            @unlink('uploads/goods/'.$request->picpic);
        }else{

            $filename = $request->picpic;
        }

        if ($bool = Good::where('id', $id)->update([
            'goodname'=>$request->goodname,
            'typeid' =>$request->typeid,
            'buy'=>$request->buy,
            'price'=>$request->price,
            'picname'=>$filename,
            'inventory'=>$request->inventory,
            'brand'=>$request->brand,
            'suit'=>$request->suit,
            'makein'=>$request->makein,
            'state'=>$request->state,
            ]))
        {
            $row = \DB::table('data_goods_details')->where('goods_id', $id)->update(['details' => $request->area,
                'picname' => implode(',' , $request->file),
                'listname' => implode(',' , $request->file_detail),
            ]);
            if($row > 0 || $bool > 0){
                return redirect('/admin/goods')->with(['success' => '修改成功！']);
            }else{
                return back()->with(['success' => '修改失败！']);

            }

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
        $dataObj = Good::find($id);
        @unlink('uploads/goods/'.$dataObj->picname);
        $listObj = \DB::table('data_goods_details')->where('goods_id', $id)->get();
        $listObj[0]->picname = explode(',', $listObj[0]->picname);
        $listObj[0]->listname = explode(',', $listObj[0]->listname);
        foreach($listObj[0]->picname as $val){
            @unlink('uploads/goods/'.$val);
        }
        foreach($listObj[0]->listname as $val){
            @unlink('uploads/goods/'.$val);
        }


        if(Good::destroy($id) && \DB::table('data_goods_details')->where('goods_id', $id)->delete()){
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

    public function del(Request $request)
    {
        $filename = $request->name;
        $bool = @unlink('uploads/goods/'.$filename);
        if($bool){
            return 1;
        }else{
            return 2;
        }
    }
}
