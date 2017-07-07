<?php

namespace App\Http\Controllers;

use App\Admin\Recommend;
use Illuminate\Http\Request;

use App\Http\Requests;

class GoodsListController extends Controller
{
	public function goodsList(Request $request, $id)
	{
		$list = $request->all();
		foreach ($list as $key => $ve) ;

		$types = \DB::table('data_types')->where('id', '=', $key)->get();

		$type = \DB::table('data_types')->where('id', '=', $id)->get();

		foreach ($types as $val) {
			$val->children = \DB::table('data_types')->where('pid', $val->id)->get();

			foreach ($val->children as $children) {

			}
		}
		$recommend = Recommend::paginate(3);
		$goods     = \DB::table('data_goods')->where('typeid', $id)->paginate(8);

		return view('web.goods.list', compact('goodslist', '', ['type', 'goods', 'children', 'types', 'recommend']));
	}

	public function ajax(Request $request)
	{
		$id   = $request->pid;
		$path = $request->path;
		if ($path == 'buys') {

			$datas = \DB::table('data_goods')->where('typeid', $id)->orderBy('buy', 'asc')->limit(8)->get();

		} elseif ($path == 'prices') {

			$datas = \DB::table('data_goods')->where('typeid', $id)->orderBy('price', 'asc')->limit(8)->get();

		}


		return $datas;


	}


}
