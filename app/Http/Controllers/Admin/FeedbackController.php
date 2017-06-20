<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FeedbackController extends Controller
{
	public function index()
	{

		//获取客户反馈信息
		$data = \DB::table('data_feedback')->orderBy('created_at', 'desc')->Paginate(10);

		//获取反馈信息总数量
		$count = \DB::select('select count(*)  from data_orders');


		//输出反馈页首页模板
		return view('admin.feedback.index', compact('data', 'count'));

	}

	public function  show(Request $request, $id)
	{



		//查询反馈信息为$id 的反馈详情星期
		$data = \DB::table('data_feedback_details')->where('feedback_id', '=', $id)->get();

		//输出视图模板
		return view('admin.feedback.details', ['data' => $data[0]]);


	}

	public function destroy($id)
	{
		//开启事务
		\DB::beginTransaction();

		//删除 反馈表中的数据 并将结果放入到 info 变量中
		$info = \DB::table('data_feedback')->where('id','=',$id)->delete();

		//删除 反馈详情表中的数据 并将结果放入到 info2 变量中
		$info2 = \DB::table('data_feedback_details')->where('feedback_id','=',$id)->delete();

		//判断是否删除成功
		if( $info && $info2 ){

			//删除成功 并提交事务
			\DB::commit();
			return redirect('/admin/feedback')->with(['success' => '删除成功！']);

		}else{

			//删除失败 并回滚事务
			\DB::rollBack();
			return back()->with(['success' => '删除失败']);
		}

	}

}
