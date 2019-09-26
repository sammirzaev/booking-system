<?php

namespace App\Http\Controllers\Admin;

class IndexController extends AdminController
{
    public function __construct()
    {
        parent::__construct();

        $this->title = 'Dashboard';
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return $this->view;
    }
}