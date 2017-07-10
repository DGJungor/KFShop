<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Type;
use function Couchbase\basicDecoderV1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Admin\Recommend;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManager;
use Carbon\Carbon;

class RecommendController extends Controller
{
    /**
     * Display a listing of the resource.
     * 推荐列表页
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //模糊查询推荐名称，默认空值
        $searchs = request()->input('searchs', '');

        //查询类型
        $type = Type::all();

        //一页显示的条数
        $page=10;

        //推荐位置的文字显示
        $stor = ['1' => '首页', '2' => '其他页'];

        //查询商品
        $recommend = Recommend::where('recommend_name', 'like', "%{$searchs}%")->paginate($page);

        return view('admin.recommend.index', ['recommend'=>$recommend, 'type'=>$type, 'stor'=>$stor]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //返回推荐的创建视图
        return view('admin.recommend.create');
    }

    /**
     * Store a newly created resource in storage.
     * 创建推荐
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //判断获取的数据是否是post提交
        if ($request->isMethod('post')) {
            //把获取的图片名赋给变量名
            $file = $request->file('recommend_picname');

            // 文件是否上传成功
            if ($file->isValid()) {
                // 获取文件相关信息
                $originalName = $file->getClientOriginalName(); // 文件原名

                $ext = $file->getClientOriginalExtension();     // 扩展名

                $realPath = $file->getRealPath();   //临时文件的绝对路径
                $type = $file->getClientMimeType();     // image/jpeg
                $filePath = public_path('uploads');
                // 上传文件
                $fileName = date('Y-m-d-H-i-s') . '-' . uniqid() . '.' . $ext;
                // 使用新建的uploads本地存储空间（目录）
                $bool = Storage::disk('uploads')->put($fileName, file_get_contents($realPath));

                $image = new ImageManager();

                $image->make($filePath.'/'.$fileName)->resize(136,124)->save($filePath.'/s_'.$fileName);

                $image->make($filePath.'/'.$fileName)->resize(130,130)->save($filePath.'/x_'.$fileName);

                $request->recommend_picname=$fileName;

                $request->created_at=Carbon::now();
                //执行数据创建

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

        //查询对应id的数据
        $data = Recommend::find($id);

        //返回给修改的视图
        return view('admin.recommend.edit', compact('data'));


    }
    /**
     * Update the specified resource in storage.
     * 修改推荐
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //查询获取对应id的数据，进行修改操作
        if(Recommend::where('id', '=', $id)->update([

            'recommend_name' =>$request->recommend_name,
            'recommend_location' =>$request->recommend_location,
            'recommend_introduction' =>$request->recommend_introduction,

        ])){

            return redirect('/admin/recommend')->with(['success'=>'修改成功']);

        }else{

            return back()->with(['success'=>'修改失败']);

        }

    }

    /**
     * Remove the specified resource from storage.
     * 删除推荐位
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //删除相对id的图片信息
        $filePath = public_path('uploads');

        $file = DB::table('data_recommend')->where('id', '=', $id)->select('recommend_picname')->get();

        foreach ($file as $v) $fileName = $v->recommend_picname;

        if (Recommend::destroy($id)) {

            Storage::disk('uploads')->delete($fileName);
            Storage::disk('uploads')->delete('s_'.$fileName);
            Storage::disk('uploads')->delete('l_'.$fileName);
            return redirect('/admin/recommend')->with(['success'=>'删除成功']);

        } else {

            return back()->with(['success'=>'删除失败']);

        }

    }

}
