<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('roles')->insert([
            [
                'name' => 'admin'
            ],
            [
                'name' => 'manager'
            ],
            [
                'name' => 'user'
            ],
        ]);
    }
}
