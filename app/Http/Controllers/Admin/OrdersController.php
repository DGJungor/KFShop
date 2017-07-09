<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{

	public function index()
	{

		//获取订单总数量
		$count = \DB::select('select count(*)  from data_orders');


		$data = \DB::table('data_orders')
			->orderBy('created_at', 'desc')
			->Paginate(10);

		foreach ($data as $v) {
			switch ($v->{'pay_type'}) {
				case '1':
					$v->{'pay_typeCH'} = '支付宝';
					break;
				case '2':
					$v->{'pay_typeCH'} = '微信';
					break;
				case '3':
					$v->{'pay_typeCH'} = '货到付款';
					break;
				case '4':
					$v->{'pay_typeCH'} = '其他';
					break;

				default:
					$v->{'pay_typeCH'} = '未知';
					break;
			}
		}

		//输出订单页首页模板
		return view('admin.orders.index', [
			'data'  => $data,
			'count' => $count
		]);

	}

	public function destroy($id)
	{
		$info = \DB::table('data_orders')->where('guid', '=', $id)->delete();
		if ($info) {
			return redirect('/admin/orders')->with(['success' => '删除成功！']);
		} else {
			return back()->with(['success' => '删除失败']);
		}

	}


	public function show($id)
	{
		//获取订单商品总数量
		$count = \DB::table('data_orders_details')->where('orders_guid', '=', $id)->count();

		//从数据库中取出订单号为$id的订单数据
		$data = \DB::table('data_orders_details')->where('orders_guid', '=', $id)->orderBy('created_at', 'desc')->get();


		foreach ($data as $v) {

			//从商品表中取出商品图片名
			$picname = DB::table('data_goods')
				->where('id', '=', $v->{'goods_id'})
				->select('picname')
				->first();

			if($picname){
				$v->{'picname'} = $picname->{'picname'};
			}else{
				return '商品数据丢失';
			}



			//退货中文
			switch ($v->{'return_status'}) {
				case '1':
					$v->{'return_statusCH'} = '不退货';
					break;
				case '2':
					$v->{'return_statusCH'} = '退货';
					break;

				default:
					$v->{'return_statusCH'} = '未知';
					break;
			}

			//评论中文
			switch ($v->{'comment_status'}) {
				case '1':
					$v->{'comment_statusCH'} = '未评论';
					break;
				case '2':
					$v->{'comment_statusCH'} = '已评论';
					break;

				default:
					$v->{'comment_statusCH'} = '未知';
					break;
			}
		}
//		dump($data);
		return view('admin.orders.details', [
			'count' => $count,
			'data'  => $data,
		]);
	}

	public function update(Request $request, $id)
	{
		//判断需要修改订单数据的数据
		$type = $request->type;

		//获得需要修改数据的订单ID
		$guid = $request->guid;
//		dd($request);

		//根据类型修改数据库订单数据
		switch ($type) {
			case 'SendOut':

				//修改数据局订单状态为已发货
				$info = \DB::table('data_orders')->where('guid', '=', $guid)->update(['order_status' => 3]);

				//判断是否修改成功  根据情况返回相应的信息
				if ($info) {
					return redirect('/admin/orders')->with(['success' => '发货成功！']);
				} else {
					return back()->with(['success' => '发货失败!']);
				}


				break;
			default:
				break;
		}
	}


}
