<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            // [
            // 'name' => 'Jeet',
            // 'username' => 'jeet',
            // 'password' => Hash::make('jeet1234'),
            // 'role' => 'admin'

            // ],
            [
                'name' => 'Tapos',
                'username' => 'tapos',
                'password' => Hash::make('tapos1234'),
                'role' => 'admin'
            ],
            [
                'name' => 'Tony',
                'username' => 'tony',
                'password' => Hash::make('tony1234'),
                'role' => 'admin'
            ],
            [
                'name' => 'Jeet',
                'username' => 'jeet',
                'password' => Hash::make('jeet'),
                'role' => 'admin'
            ],
            [
                'name' => 'User',
                'username' => 'user',
                'password' => Hash::make('user'),
                'role' => 'user'
            ]
        ]);
    }
}
