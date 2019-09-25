<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Project | Title
     * @var string
     */
    protected $title = '';

    /**
     * @var \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    protected $view;

    /**
     * @var array
     */
    protected $breadcrumbs = [];

    /**
     * AdminController constructor.
     */
    public function __construct()
    {
        $this->view = $this->setView();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    protected function setView()
    {
        $controllerAction = substr(strrchr(\Route::currentRouteAction(), "\\"), 1);

        $str = strpos($controllerAction, "@");
        $action = substr_replace($controllerAction, '',0, $str + 1);

        if(in_array($action, ['store', 'update', 'destroy'])){
            return null;
        }

        $search = ['Controller', '@'];
        $replace = ['', '.'];

        return view('admin.' . lcfirst(str_replace($search, $replace, $controllerAction)));
    }

    /**
     * @param string $method
     * @param array $parameters
     * @return \Illuminate\View\View|\Symfony\Component\HttpFoundation\Response
     */
    public function callAction($method, $parameters)
    {
        $action = parent::callAction($method, $parameters);
        if($this->view){
            return $this->view
                    ->with('title', $this->title)
                    ->with('breadcrumbs', $this->breadcrumbs);
        }
        return $action;
    }
}