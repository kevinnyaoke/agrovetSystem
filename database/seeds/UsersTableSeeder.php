<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker::create();
        App\User::create([
            'name'=>'admin',
            'admin'=>'1',
            'email'=>'admin@gmail.com',
            'file'=>'file',
            'password'=>bcrypt('password')
        ]);
        App\User::create([
            'name'=>'user',
            'admin'=>'0',
            'email'=>'user@gmail.com',
            'file'=>'file',
            'password'=>bcrypt('password')
        ]);
    }
}
