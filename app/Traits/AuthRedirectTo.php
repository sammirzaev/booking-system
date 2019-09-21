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
            return '/backend';
        }
        return '/user/dashboard';
    }
}