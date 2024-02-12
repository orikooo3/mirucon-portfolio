<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'UserName',
            'email' => 'User@test.com',
            'password' => Hash::make('password'),
            'age' => 21,
            'sex' => 0,
            'height' => 170,
        ]);
    }
}
