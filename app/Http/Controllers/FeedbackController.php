<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class FeedbackController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		//
		return view('web.feedback.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
		return 'create';

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{

		//开启事务
		\DB::beginTransaction();

		//在deta_feedback中插入数据 并返回插入数据的 id 赋值到$feedback_id中
		$feedback_id = \DB::table('data_feedback')->insertGetId(
			[
				'user_id' => '',
				'title' => $request->title,
				'created_at' => date('YmdHis'),
			]
		);

		//在deta_feedback_details中插入数据 并返回插入数据的 id 赋值到$feedback_details_id中
		$feedback_details_id = \DB::table('data_feedback_details')->insertGetId([
			'feedback_id' => $feedback_id,
			'user_id' => '',
			'title' => $request->title,
			'text' => $request->text,
			'created_at' => date('YmdHis'),
		]);

		//判断数据是否均插入成功.
		if ($feedback_id && $feedback_details_id) {

			//插入成功 并提交事务
			\DB::commit();
			return redirect('/feedback')->with(['success' => '提交成功！']);

		} else {

			//删除失败 并回滚事务
			\DB::rollBack();
			return back()->with(['success' => '提交失败!']);
		}


	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		//
	}
}
