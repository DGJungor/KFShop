<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
//use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Admin\Friend;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class FriendController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        //友情链接模糊查询，默认空值
        $search=request()->input('search','');

        //查询类型
        $type = Type::all();

        //一页的显示的条数
        $page = 8;

        //查询商品
        $friend = Friend::where('name', 'like', "%{$search}%")->paginate($page);

        //给状态加解析名
        $stor = ['1' => '图片', '2' => '文字'];

        $status = ['0' => '启用', '1' => '禁用'];
        //访问友情链接首页
        return view('admin.friends.index', ['friend'=>$friend, 'type'=>$type, 'stor'=>$stor, 'status'=>$status]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        //找到友情链接的id
        $dataObj = Friend::find($id);
        // dump($dataObj);
        //返回值给修改页面
        return view('admin.friends.edit', compact('dataObj'));

    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        //
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

//        $this->validate($request, [
//            'name' => 'required|min:1|max:30',
//            'url' => 'required',
//
//        ], [
//            'required' => ':attribute 是必填字段',
//            'min' => ':attribute 必须不少于3个字符',
//            'max' => ':attribute 必须少于30个字符',
//
//        ], [
//                'name' => '友情链接名称',
//                'url' => '链接地址',
//
//            ]
//        );
        $data = new Friend();
        $data->name = $request->input('name');
        if($request->input('url')!= ''){
            $data->url = $request->input('url');
        }
        $data->type = $request->input('type');
        $data->image = NULL;
        if($request->hasFile('file') && $request->file('file')->isValid()){
            $filePath='/uploads/friends/';
            $fileName=str_random(10).'.png';
            Image::make($request->file('file'))
                ->encode('png')
                ->resize(50, 50)
                ->save('.'.$filePath.$fileName);
            $data->image=$filePath.$fileName;
        }
        $data->save();
        return redirect()->to('admin/friends')->withSuccess('新增轮播图成功！');


    }

    public function destroy($id)
    {

        $filePath=public_path('uploads');
        $file=DB::table('data_friend_link')->where('id', '=', $id)->select('image')->get();
        foreach ($file as $v)
            $fileName=$v->image;
//        dd($fileName);
        if (Friend::destroy($id)) {

            Storage::disk('uploads')->delete($fileName);
            Storage::disk('uploads')->delete('x_'.$fileName);
            return redirect('/admin/friends')->with(['删除成功']);

        } else {

            return back()->with(['删除失败']);

        }

    }



}
