<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
        'firstName' => 'Yugeswaran',
         'lastName' => 'Sivanathan',
         'email' => 'sivayuges@gmail.com',
         'password' => Hash::make('password'),
     ]);

     factory(App\User::class, 5)->create();
    }
}
