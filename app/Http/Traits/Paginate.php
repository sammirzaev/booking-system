<?php

namespace App\Http\Traits;

trait Paginate
{
    /**
     * @return \Illuminate\Config\Repository|int|mixed
     */
    public function getPaginate()
    {
        if ($value = \Request::cookie($this->view->getName())){
            return intval($value);
        }
        return $this->getDefault($this->view->getName());
    }

    /**
     * @param $value
     * @return \Illuminate\Config\Repository|mixed
     */
    public function getDefault($value)
    {
        return config('paginate.' . $value);
    }
}