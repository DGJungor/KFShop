<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin\Recommend;
use App\Http\Requests;

class HomeController extends Controller
{
    public function index()
    {
        $recommend=Recommend::paginate(4);

        return view('web.nav.nav', compact(['recommend']));

    }

    public function ajax()
    {

    }
}
