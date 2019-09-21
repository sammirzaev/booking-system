<?php

namespace App\Http\Controllers\Admin;

class IndexController extends AdminController
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.index.index');
    }
}