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
		$key = $_GET['search'];

		//page
		$page   = isset($_GET['page']) ? $_GET['page'] : 1;
		if($page<1){
			$page = 1;
		}
		$offset = $page * 12 - 12;

		//指定商品列表类型为搜索
		$type = 'search';

		//实例化对象 迅搜
		$xs = new XS(config_path('search-goods.ini'));

		//获取搜索对象
		$search = $xs->search;

		//搜索条件
		$search->setQuery($key)
			->setSort('buy')
			->setLimit(12, $offset);

		//执行搜索
		$doc = $search->search();

//		dump($doc);
		return view('web.goods.list', [
			'type'   => $type,
			'search' => $key,
			'goods'  => $doc,
			'page'   =>$page,
		]);
	}

}
