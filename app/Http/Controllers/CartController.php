<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Overtrue\LaravelShoppingCart\Cart;

class CartController extends Controller
{
	//
	public function index(Cart $cart)
	{
		$row = $cart->add(37, 'Item name', 5, 100.00, ['color' => 'red', 'size' => 'M']);
		$cart->add(37, 'Item name', 5, 100.00, ['color' => 'red', 'size' => 'M']);
		$cart->add(127, 'foobar', 15, 100.00, ['color' => 'green', 'size' => 'S']);
		$aa = $cart->all();
		$rawId = $row->rawId();
		foreach ($aa as $v) {
			echo $v->{'color'};
		}
		dd($aa);
		return view('web.cart.index');
	}
}
