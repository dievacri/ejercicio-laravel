<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Diego',
            'last_name' => 'Vasquez',
            'user' => 'dievacri',
            'password' => '12345',
            'active' => true,
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }
}
