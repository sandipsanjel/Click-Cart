<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;



class Userseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {//this seeder is used to seed the user data in database like user loging in into the system
        DB::table('users')->insert([
            'name'=>'sandip',
                 'email'=>'sandip@gmail.com',
                 'password'=>Hash::make('1234')
        ]);
    }
}
