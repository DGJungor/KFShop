<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Admin\Type;

class TypesController extends Controller
{
    /**
     * Display a listing of the resource.
     * 首页展示
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $sql = concat('path', 'id');
        $dataObj = \DB::select('select * from data_types order by concat(path,id) asc' );
        // dd($dataObj);
        return view('admin.types.index', compact('dataObj') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.types.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $num = \DB::table('data_types')->insert(
            ['pid' => '0', 'name' => $request->typename, 'path' => '0,' ]
        );
        if($num){
            return redirect('/admin/types')->with(['success' => '添加成功！']);

        }else{
            return redirect('/admin/types')->with(['success' => '添加失败！']);

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
        // $dataObj = Type::find($id);
        // return view('admin.types.create', compact('dataObj'));
    }

    /**
     * Show the form for editing the specified resource.
     * 表单视图
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $num = \DB::table('data_types')->insert(
            ['pid' => $id, 'name' => $request->typename, 'path' => $request->path.$id.',' ]
        );
        if($num){
            return redirect('/admin/types')->with(['success' => '添加成功！']);

        }else{
            return redirect('/admin/types')->with(['success' => '添加失败！']);

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
        $data = \DB::select('select * from data_types where pid = '.$id);
        if (empty($data)) {


            if(Type::destroy($id)){
                return redirect('/admin/types')->with(['success' => '删除成功！']);
            } else{
                return back()->with(['success' => '删除失败']);
            }
        }else{

            return back()->with(['success' => '删除失败, 不能删除有子类的分类']);

        }
    }
}
