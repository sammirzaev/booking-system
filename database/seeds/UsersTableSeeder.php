<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name     = 'Admin';
        $user->email    = 'admin@test.com';
        $user->password = bcrypt('12345678');
        $user->save();

        $role = Role::where('name', 'admin')->first();
        $role->users()->attach($user);
    }
}
