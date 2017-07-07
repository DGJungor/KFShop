<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use XS;

class SearchController extends Controller
{
	//
	public function indexS(Request $request)
	{
		//获取搜索的值
		$key = $request->search;

		//实例化对象 迅搜
		$xs = new XS(config_path('search-goods.ini'));

		//获取搜索对象
		$search = $xs->search;

//		$data = $search->search($key);

		$search->setQuery($key)
		->setLimit(20, 0); // 设置搜索语句, 分页, 偏移量

		$doc =$search->search();

		$count = $search->count();

		$inde = $xs->index;
		dump($key);
		dump($inde);
		dump($doc);
		dump($count);
		return '1234';
	}
}
