<?php

namespace Database\Seeders;

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
        DB::table('rooms')->insert([
            'name'=> 'Tamil Room',
            'slug'=>'tamil-room',
            'creator'=> 'Jafa'
        ]);
        DB::table('rooms')->insert([
            'name'=> 'Game Room',
            'slug'=>'game-room',
            'creator'=> 'Jafa'
        ]);
        DB::table('users')->insert([
            'name' => 'ChatBot',
            'email' => 'bot@chat.com',
            'password' => bcrypt('password'),
            'avatar' => 'bot.jpg',
            'gender' => 4,
            'age' => 18,
            'status' => 1,
            'ip_address' => '127.0.0.1',
            'time_zone' => 'kolkata',
            'country' => 'india',
            'is_bot'=> true
        ]);
        DB::table('users')->insert([
            'name' => 'Jarvis',
            'email' => 'jarvis@gmail.com',
            'password' => bcrypt('password'),
            'avatar' => 'jarvis.jpg',
            'gender' => 1,
            'age' => 18,
            'status' => 1,
            'ip_address' => '127.0.0.1',
            'time_zone' => 'kolkata',
            'country' => 'india',
        ]);
        DB::table('users')->insert([
            'name' => 'Pagalavan',
            'email' => 'pagalavan@gmail.com',
            'password' => bcrypt('password'),
            'avatar' => 'pagalavan.jpg',
            'gender' => 1,
            'age' => 20,
            'status' => 1,
            'ip_address' => '127.0.0.1',
            'time_zone' => 'Kolkata',
            'country' => 'India',
        ]);

        DB::table('users')->insert([
            'name' => 'Sulai',
            'email' => 'sulai@gmail.com',
            'password' => bcrypt('password'),
            'avatar' => 'ibu.png',
            'gender' => 1,
            'age' => 15,
            'status' => 1,
            'ip_address' => '127.0.0.1',
            'time_zone' => 'Kolkata',
            'country' => 'India',
        ]);
    }
}
