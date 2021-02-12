<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            [
                'name' => 'admin',
                'email' => 'admin@wj.com',
                'phone' => '081234567890',
                'role' => 'Admin',
                'password' => \Illuminate\Support\Facades\Hash::make('12345678')
            ],
            [
                'name' => 'Michael Tanaka',
                'email' => 'mt@wj.com',
                'phone' => '081234567890',
                'role' => 'User',
                'password' => \Illuminate\Support\Facades\Hash::make('12345678')
            ], [
                'name' => 'Ricco',
                'email' => 'ricco@wj.com',
                'phone' => '081234567890',
                'role' => 'User',
                'password' => \Illuminate\Support\Facades\Hash::make('12345678')
            ]
        ]);
    }
}
