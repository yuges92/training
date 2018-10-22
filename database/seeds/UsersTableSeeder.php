<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;
class UsersTableSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    $role_SA = Role::where('name', 'Super Admin')->first();

    $user= new User();
    $user->firstName='Yugeswaran';
    $user->lastName='Sivanathan';
    $user->email='sivayuges@gmail.com';
    $user->username='sivayuges';
    $user->password=Hash::make('password');
    $user->save();
    $user->roles()->attach($role_SA);

    // factory(App\User::class, 5)->create();
    factory(App\User::class, 5)->create()->each(function ($u) {
      $role_learner = Role::where('name', 'Learner')->first();
      $u->roles()->attach($role_learner);

   });
  }
}
