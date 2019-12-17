<?php

namespace App\Http\Traits;

use App\User as ModelUser;

trait User
{
    /**
     * @param $request
     * @return \App\User|bool
     */
    private function createUser($request)
    {
        if (!auth()->id())
        {
            $user = new ModelUser();
            $user->name         = $request->first_name;
            $user->last_name    = $request->last_name;
            $user->email        = $request->email;
            $user->password     = \Hash::make($request->password);

            if ($user->save())
            {
                $user->detail()->create([
                    'tel'       => $request->telephone,
                    'country'   => $request->country,
                    'region'    => $request->region_state,
                    'city'      => $request->city,
                    'address'   => $request->address,
                    'zip'       => $request->postcode,
                    'user_id'   => $user->id
                ]);
                auth()->login($user);
                return $user;
            }
        }
        else{
            return auth()->user();
        }
        return false;
    }
}
