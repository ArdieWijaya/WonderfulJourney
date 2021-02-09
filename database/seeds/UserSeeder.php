<?php

use Illuminate\Database\Seeder;

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
            ]
        ]);
    }
}
