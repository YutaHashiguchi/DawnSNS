<?php

use Illuminate\Database\Seeder;


class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('posts')->insert([
            [
                'user_id' => 3,
                'posts' => 'SNSはじめました'
            ],
            [
                'user_id' => 3,
                'posts' => 'はじめての投稿'
            ]
        ]);
    }
}
