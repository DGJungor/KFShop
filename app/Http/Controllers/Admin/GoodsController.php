<?php

namespace App\Http\Controllers\Admin;
use Storage;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Admin\Good;



class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     * 首页展示
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataObj = Good::paginate(10);
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
        $file = $request->file('picture');
        // dd($file);
        // 文件是否上传成功
        if ( $file->isValid() ) {
            // 获取文件相关信息
            $originalName = $file->getClientOriginalName(); // 文件原名
            $ext = $file->getClientOriginalExtension();     // 扩展名
            $realPath = $file->getRealPath();   //临时文件的绝对路径
            $type = $file->getClientMimeType();     // image/jpeg
            // dd($realPath);
            // 上传文件
            $filename = date('Y-m-d-H-i-s') . '-' . uniqid() . '.' . $ext;
            // 使用我们新建的uploads本地存储空间（目录）
            $bool = Storage::disk('uploads')->put($filename, file_get_contents($realPath));

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

            $row = \DB::table('data_goods')->insert([
                'goodname'=>$request->goodname,
                'typeid' =>$typeid,
                'buy'=>$request->buy,
                'brand'=>$request->brand,
                'describe'=>$request->describe,
                'picname'=>$filename,
                'suit'=>$request->suit,
                'makein'=>$request->makein,
                'state'=>$request->state,
            ]);

            if ($row) {
               return redirect('/admin/goods')->with(['success' => '添加商品成功！']);
            }else {
                return back()->with(['success' => '添加失败！']);
            }

        } else {
            return back()->with(['success' => '添加失败！,上传图片出错']);
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
        return view('admin.goods.show');
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
        dd($request->all());
        if (Good::where('id','=',$id)->update([
            'goodname'=>$request->goodname,
            'typeid' =>$request->typeid,
            'buy'=>$request->buy,
            'brand'=>$request->brand,
            'describe'=>$request->describe,
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
        $dataObj = \DB::table('data_types')->where('pid', $pid)->get();
        return json_encode($dataObj);
    }
}
