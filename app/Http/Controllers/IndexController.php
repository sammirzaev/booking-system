<?php

namespace App\Http\Controllers;

class IndexController extends FrontendController
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index.index');
    }
}
