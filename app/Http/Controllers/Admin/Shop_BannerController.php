<?php

namespace App\Http\Controllers\Admin;

use App\Admin\ShopBanner;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class Shop_BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     * 返回后台轮播图首页视图
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //获取模型的数据，在分页传值
        $data = ShopBanner::paginate(12);

        return view('admin.shop_banner.index', compact(['data']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //返回创建的视图
        return view('admin.shop_banner.create');
    }

    /**
     * Store a newly created resource in storage.
     * 创建轮播图
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //实例ShopBanner模型的类
        $data = new ShopBanner();
        //实现创建数据的操作
        $data->title = $request->input('title');

        if($request->input('redirect_url')!= ''){

            $data->redirect_url = $request->input('redirect_url');

        }

        $data->sort = $request->input('sort');

        $data->disabled = $request->input('disabled');

        $data->img_url = NULL;
        //判断是否有上传的图片
        if($request->hasFile('file') && $request->file('file')->isValid()){

            $filePath = '/uploads/banner/';
            $fileName = str_random(10).'.png';
            Image::make($request->file('file'))
                ->encode('png')
                ->resize(1400, 430)
                ->save('.'.$filePath.$fileName);
            $data->img_url=$filePath.$fileName;
        }

        $data->save();

        return redirect()->to('admin/shop_banner')->with(['success'=>'新增轮播图成功！']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * 返回修改页
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //查询对应id的数据
        $data = ShopBanner::find($id);
        //返回视图
        if($data){

            return view('admin.shop_banner.edit')->with(['data'=>$data]);

        }else{

            return redirect()->to('admin/shop_banner')->with(['success'=>'对应的轮播图不存在!']);

        }
    }

    /**
     * Update the specified resource in storage.
     * 修改对应的轮播图
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //获取想要修改的id的数据
        $data = ShopBanner::find($id);
        //执行修改数据的操作
        $data->title = $request->input('title');

        if($request->input('redirect_url')!= ''){

            $data->redirect_url = $request->input('redirect_url');

        }

        $data->sort = $request->input('sort');

        $data->disabled = $request->input('disabled');
        //执行图片上传或修改的操作步骤
        if($request->hasFile('file') && $request->file('file')->isValid()) {

            $filePath = '/uploads/banner/';
            $fileName = str_random(10) . '.png';
            Image::make($request->file('file'))
                ->encode('png')
                ->resize(1400, 430)
                ->save('.' . $filePath . $fileName);
            $data->img_url=$filePath . $fileName;
        }

        $data->save();

        return redirect()->to('admin/shop_banner')->with(['success'=>'修改轮播图成功!']);
    }

    /**
     * Remove the specified resource from storage.
     * 删除对应的轮播图
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //执行删除相对应id的数据
        $data = ShopBanner::find($id);

        if($data){

            $data->delete();
            return redirect()->to('admin/shop_banner')->withSuccess('删除轮播图成功！');

        }else{

            return redirect()->to('admin/shop_banner')->withError('删除失败，未找到对应轮播图！');

        }
    }
}
