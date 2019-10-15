<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Traits\AuthRedirectTo;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers, AuthRedirectTo;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
//    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'      => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email'     => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'  => ['required', 'string', 'min:8', 'confirmed'],

            'telephone'     => 'required|string|max:15',
            'address'       => 'string|max:255|nullable',
            'postcode'      => 'string|max:50|nullable',
            'city'          => 'string|max:50|nullable',
            'region_state'  => 'string|max:50|nullable',
            'country'       => 'string|max:50|nullable',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name'          => $data['name'],
            'last_name'     => $data['last_name'],
            'email'         => $data['email'],
            'password'      => Hash::make($data['password']),
        ]);

        if ($user){
            $user->detail()->create([
                'tel'       => $data['telephone'],
                'country'   => $data['country'],
                'region'    => $data['region_state'],
                'city'      => $data['city'],
                'address'   => $data['address'],
                'zip'       => $data['postcode'],
                'user_id'   => $user->id
            ]);
            return $user;
        }
    }
}
