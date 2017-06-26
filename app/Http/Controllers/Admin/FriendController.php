<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Storage;
//use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Admin\Friend;
use DB;

class FriendController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = \DB::table('data_friend_link')->get();
        // dump($data);
        //访问友情链接首页
        $type = ['1' => '图片', '2' => '文字'];

        $status = ['0' => '启用', '1' => '禁用'];

        return view('admin.friends.index', compact('data', 'type', 'status'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $dataObj = Friend::find($id);
        // dump($dataObj);
        return view('admin.friends.edit', compact('dataObj'));

    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {

        if (Friend::where('id', '=', $id)->update([
            'name' => $request->name,
            'type' => $request->type,
            'url' => $request->url,
            'image' => $request->image,
            'status' => $request->status,
        ])
        ) {
            return redirect('/admin/friends/edit')->with(['success' => '修改成功']);
        } else {
            return back()->with(['success' => '修改失败']);
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $post = Friend::find($id);

        return view('admin.friends.show', compact('post'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.friends.create');
    }

    /**
     *
     */
    public function store(Request $request)
    {
//       dump($request->all());

        $this->validate($request, [
            'name' => 'required|min:1|max:30',
            'url' => 'required',
            'image' => 'required',
        ], [
            'required' => ':attribute 是必填字段',
            'min' => ':attribute 必须不少于3个字符',
            'max' => ':attribute 必须少于30个字符',

        ], [
                'name' => '友情链接名称',
                'url' => '链接地址',
                'image' => '图片名称',
            ]
        );

        if($request->isMethod('post')){

            $file=$request->file('image');

            if($file->isValid()){
                $originalName = $file->getClientOriginalName(); // 文件原名
                $ext = $file->getClientOriginalExtension();     // 扩展名
                $realPath = $file->getRealPath();   //临时文件的绝对路径
                $type = $file->getClientMimeType();     // image/jpeg
                $filePath=public_path('uploads');

                $fileName
            }


        }
        $post = $request->all();

//          dd($post);
        if (Friend::create($post)) {
            return redirect('/admin/friends')->with(['success' => '添加成功']);
        } else {
            return back()->with(['添加失败']);
        }
    }

    public function destroy($id)
    {
        if (Friend::destroy($id)) {
            return redirect('/admin/friends')->with(['删除成功']);
        } else {
            return back()->with(['删除失败']);
        }

    }



}
