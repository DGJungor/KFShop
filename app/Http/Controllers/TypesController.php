<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin\Type;
use App\Http\Requests;

class TypesController extends Controller
{
    /**
     * Display a listing of the resource.
     * 首页展示
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataObj = Type::find(1);
        return view('admin.types.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataObj = Type::all();
        echo $dataObj;
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
        return view('admin.types.show');
    }

    /**
     * Show the form for editing the specified resource.
     * 表单视图
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dataObj = Type::find($id);
        // dd($dataObj);
        return view('admin.types.edit', compact('dataObj'));
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
        // dd($request->all());
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
            return redirect('/admin/types')->with(['success' => '修改成功！']);
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
            return redirect('/admin/types')->with(['success' => '删除成功！']);
        } else{
            return back()->with(['success' => '删除失败']);
        }

    }
}
