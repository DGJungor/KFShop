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
        $data = Friend::find($id);
        $data->name = $request->input('name');

        $data->type = $request->input('type');

        if($request->input('url')!= ''){
            $data->url = $request->input('url');
        }
        $data->status=$request->input('status');
         //判断图片是否上传
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
        return redirect()->to('admin/friends')->with(['success'=>'修改友情链接成功!']);

    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {

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
     *
     */
    public function store(Request $request)
    {
        //友情链接创建方法
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
        return redirect()->to('admin/friends')->with(['success'=>'新增友情链接成功！']);


    }

    public function destroy($id)
    {
        //获取图片存储路径
        $filePath=public_path('uploads');
        //获取友情链接表的图片信息
        $file=DB::table('data_friend_link')->where('id', '=', $id)->select('image')->get();
        //遍历出图片的字段
        foreach ($file as $v)
            $fileName=$v->image;
        //执行删除
        if (Friend::destroy($id)) {

            Storage::disk('uploads')->delete($fileName);
            Storage::disk('uploads')->delete('x_'.$fileName);
            return redirect('/admin/friends')->with(['success'=>'删除成功']);

        } else {

            return back()->with(['success'=>'删除失败']);

        }

    }



}
