<?php

namespace App\Http\Controllers\Admin;

use function Couchbase\basicDecoderV1;
use Illuminate\Http\Request;
use Storage;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Admin\Recommend;
use DB;
use Intervention\Image\ImageManager;
use Carbon\Carbon;

class RecommendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

//        $data = \DB::table('data_recommend')->get();
//        dump($data);
        $data=Recommend::paginate(20);
        return view('admin.recommend.index', compact(['data']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.recommend.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

//        dd($request->all());
        if ($request->isMethod('post')) {

            $file = $request->file('recommend_picname');

            // 文件是否上传成功
            if ($file->isValid()) {
                // 获取文件相关信息
                $originalName = $file->getClientOriginalName(); // 文件原名
                $ext = $file->getClientOriginalExtension();     // 扩展名
                $realPath = $file->getRealPath();   //临时文件的绝对路径
                $type = $file->getClientMimeType();     // image/jpeg
                $filePath=public_path('uploads');
                // 上传文件
                $fileName = date('Y-m-d-H-i-s') . '-' . uniqid() . '.' . $ext;
//                $image->make($filePath.'/'.$filename)->resize(200,200)->save($filePath."/"."s_".$filename);

                // 使用新建的uploads本地存储空间（目录）
                $bool = Storage::disk('uploads')->put($fileName, file_get_contents($realPath));
                $image=new ImageManager();
                $image->make($filePath.'/'.$fileName)->resize(136,124)->save($filePath.'/s_'.$fileName);
                $request->recommend_picname=$fileName;
                $request->created_at=Carbon::now();
//                dd($request->created_at);
                $rec = \DB::table('data_recommend')->insert([
                    'recommend_name'=>$request->recommend_name,
                    'recommend_location'=>$request->recommend_location,
                    'recommend_type'=>$request->recommend_type,
                    'recommend_picname'=>$request->recommend_picname,
                    'recommend_introduction'=>$request->recommend_introduction,
                    'created_at'=>$request->created_at,
                ]);
                    return redirect('/admin/recommend')->with(['成功']);
            }

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


        $data = Recommend::find($id);
//        dd($dataObj);
//        $img=Image::canvas(800, 600, '#ccc');
        return view('admin.recommend.edit', compact('data'));


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
        if(Recommend::where('id', '=', $id)->update([
           'recommend_name'=>$request->recommend_name,
            'recommend_introduction'=>$request->recommend_introduction,
        ])){

            return redirect('/admin/recommend')->with(['success'=>'修改成功']);

        }else{

            return back()->with(['success'=>'修改失败']);

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $filePath = public_path('uploads');
        $file = DB::table('data_recommend')->where('id', '=', $id)->select('recommend_picname')->get();
        foreach ($file as $v) $fileName = $v->recommend_picname;
        if (Recommend::destroy($id)) {
            Storage::disk('uploads')->delete($fileName);
            Storage::disk('uploads')->delete('s_'.$fileName);
            Storage::disk('uploads')->delete('l_'.$fileName);
            return redirect('/admin/recommend')->with(['删除成功']);

        } else {

            return back()->with(['删除失败']);

        }

    }

    public function ajax()
    {

    }
}
