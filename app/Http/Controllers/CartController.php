<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Overtrue\LaravelShoppingCart\Cart;

use Illuminate\Session\Store;

use Illuminate\Support\Facades\Redis;

class CartController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Cart $cart,Request $request,Store $store)
	{

//		$row = $cart->add(37., 'Item name', 5, 100.00, ['color' => 'red', 'size' => 'M']);
//		$cart->add(37, 'Item name', 5, 100.00, ['color' => 'red', 'size' => 'M']);
//		$cart->add(127, 'foobar', 15, 100.00, ['color' => 'green', 'size' => 'S']);
//		$aa = $cart->all();
//		$rawId = $row->rawId();
//		foreach ($aa as $v) {
//			echo $v->{'color'};
//		}
//		$request->session()->put('123','123');
//		$request->session()->save();
//		\Redis::get();
//		$session= $this->getSession($request);
//		session()->start();
//		$store->save();
//		 $a = $store->start();



//		 $v = Redis::set('123','312');
		$a = $request->session()->all();
		dd($v);
		return view('web.cart.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		//
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
