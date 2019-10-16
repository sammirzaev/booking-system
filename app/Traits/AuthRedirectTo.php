<?php

namespace App\Traits;

trait AuthRedirectTo
{
    /**
     * @return string
     */
    protected function redirectTo()
    {
        $user = auth()->user()->roles()->get();
        if($user->isNotempty() && current(current($user))->name !== 'user'){
            return $this->checkDefault() . '/backend';

        }
        return  $this->checkDefault() . '/user/dashboard';
    }

    /**
     * @return string
     */
    protected function checkDefault()
    {
        if(\App::getLocale() === config('settings.locale_default')){
            return '';
        }
        return \App::getLocale();
    }
}