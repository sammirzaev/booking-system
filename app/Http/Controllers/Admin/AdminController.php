<?php

namespace App\Http\Controllers\Admin;

use App\Http\Traits\Paginate;
use Prologue\Alerts\Facades\Alert;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    use Paginate;
    
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

        return view('admin.' . strtolower(str_replace($search, $replace, $controllerAction)));
    }

    /**
     * @param string $method
     * @param array $parameters
     * @return \Illuminate\View\View|\Symfony\Component\HttpFoundation\Response
     */
    public function callAction($method, $parameters)
    {
        $action = parent::callAction($method, $parameters);

        $this->flash();

        if($this->view){
            return $this->view
                    ->with('title', $this->title)
                    ->with('breadcrumbs', $this->breadcrumbs);
        }
        return $action;
    }

    /**
     * Alert message for flash
     */
    protected function flash()
    {
        if(session('error')){
            Alert::error(session('error'))->flash();
        }
        elseif(session('success')){
            Alert::success(session('success'))->flash();
        }
        elseif(session('info')){
            Alert::error(session('info'))->flash();
        }
        elseif(session('warning')){
            Alert::success(session('warning'))->flash();
        }
    }
}