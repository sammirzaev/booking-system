<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use App\Role;
use App\User;
use App\Http\Requests\UserRequest;

class UserController extends AdminController
{
    /**
     * @var User
     */
    protected $user;

    /**
     * @var Role
     */
    private $role;

    /**
     * UserController constructor.
     * @param User $user
     * @param Role $role
     */
    public function __construct(User $user, Role $role)
    {
        $this->user = $user;
        $this->role = $role;

        parent::__construct();
        $this->title = 'User';
        $this->breadcrumbs = [['route' => route('admin.user.index'), 'item' => 'User']];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $users = $this->user::orderByDesc('id')->paginate($this->getPaginate());
        $users->load('detail');

        return $this->view
            ->with('users', $users)
            ->with('roles', $this->role->all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return $this->view
            ->with('roles', $this->role->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function store(UserRequest $request)
    {
        $this->user->name         = $request->input('first_name');
        $this->user->last_name    = $request->input('last_name');
        $this->user->email        = $request->input('email');
        $this->user->password     = \Hash::make($request->input('password'));

        if ($this->user->save()){

            $this->user->detail()->create([
                'tel'       => $request->input('telephone'),
                'country'   => $request->input('country'),
                'region'    => $request->input('region_state'),
                'city'      => $request->input('city'),
                'address'   => $request->input('address'),
                'zip'       => $request->input('postcode'),
                'user_id'   => $this->user->id
            ]);
            if($request->input('role') && current($request->input('role'))){
                $this->user->roles()->sync($request->input('role'));
            }
            else{
                $this->user->roles()->detach();
            }
            return redirect()->route('admin.user.index')->with('status', 'User created successfully');
        }
        return redirect()->back()->with('error', 'User does not created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(User $user)
    {
        $user->load('detail');

        return $this->view
            ->with('user', $user)
            ->with('roles', $this->role->all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserRequest $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function update(UserRequest $request, User $user)
    {
        $user->name         = $request->input('first_name');
        $user->last_name    = $request->input('last_name');
        $user->email        = $request->input('email');
        $user->password     = \Hash::make($request->input('password'));

        if ($user->update()){

            $user->detail()->update([
                'tel'       => $request->input('telephone'),
                'country'   => $request->input('country'),
                'region'    => $request->input('region_state'),
                'city'      => $request->input('city'),
                'address'   => $request->input('address'),
                'zip'       => $request->input('postcode'),
            ]);

            if(current($request->input('role'))){
                $user->roles()->sync($request->input('role'));
            }
            else{
                $user->roles()->detach();
            }
            return redirect()->route('admin.user.index')->with('status', 'User updated successfully');
        }
        return redirect()->back()->with('error', 'User does not updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(User $user)
    {
        if($this->check($user)){
            return redirect()->back()->with('error', ' User have order and does not deleted successfully.');
        }
        else{
            if($user->delete()) return redirect()->route('admin.user.index')->with('status', 'User deleted successfully');
        }
        return redirect()->back()->with('error', 'User does not deleted successfully');
    }

    /**
     * @param User $user
     * @return bool
     */
    protected function check(User $user)
    {
        if(Order::where('user_id', $user->id)->first()){
            return true;
        }
        return false;
    }
}
