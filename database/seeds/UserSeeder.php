<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        \App\User::truncate();
         $data = [
             'name' => "Admin",
             'email' => "admin@mailinator.com",
             'password' => Hash::make('password'),
         ];

         \App\User::insert($data);
    }
}
