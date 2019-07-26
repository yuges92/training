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
    $user->email='yugeswaran.sivanathan@dlf.org.uk';
    $user->username='yuges';
    $user->password=Hash::make('password');
    $user->save();
    $user->roles()->attach($role_SA);


    $admin= new User();
    $admin->firstName='Admin';
    $admin->lastName='Admin';
    $admin->email='admin@training.dlf.org.uk';
    $admin->username='admin';
    $admin->password=Hash::make('password');
    $admin->save();
    $admin->roles()->attach($role_SA);

  //   // factory(App\User::class, 5)->create();
  //   factory(App\User::class, 5)->create()->each(function ($u) {
  //     $role_learner = Role::where('name', 'Learner')->first();
  //     $u->roles()->attach($role_learner);

  //  });


  }
}
