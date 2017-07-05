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
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=ShopBanner::paginate(12);
        return view('admin.shop_banner.index', compact(['data']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.shop_banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new ShopBanner();
        $data->title = $request->input('title');
        if($request->input('redirect_url')!= ''){
            $data->redirect_url = $request->input('redirect_url');
        }
        $data->sort = $request->input('sort');
        $data->disabled = $request->input('disabled');
        $data->img_url = NULL;
        if($request->hasFile('file') && $request->file('file')->isValid()){
            $filePath='/uploads/banner/';
            $fileName=str_random(10).'.png';
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
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=ShopBanner::find($id);
        if($data){
            return view('admin.shop_banner.edit')->with(['data'=>$data]);
        }else{
            return redirect()->to('admin/shop_banner')->with(['success'=>'对应的轮播图不存在!']);
        }
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
        $data=ShopBanner::find($id);
        $data->title = $request->input('title');
        if($request->input('redirect_url')!= ''){
            $data->redirect_url = $request->input('redirect_url');
        }
        $data->sort = $request->input('sort');
        $data->disabled = $request->input('disabled');
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
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = ShopBanner::find($id);
        if($data){
            $data->delete();
            return redirect()->to('admin/shop_banner')->withSuccess('删除轮播图成功！');
        }else{
            return redirect()->to('admin/shop_banner')->withError('删除失败，未找到对应轮播图！');
        }
    }
}
