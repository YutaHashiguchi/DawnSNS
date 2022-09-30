<?php

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
        //
        DB::table('users')->insert([
            [
                'username' => '高田',
                'mail' => 'takada@yayaya.com',
                'password' => bcrypt('123456'),
                'bio' => 'はじめまして'
            ]
        ]);
    }
}
