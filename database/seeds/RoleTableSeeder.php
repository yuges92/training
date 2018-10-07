<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
class RoleTableSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    $role_employee = new Role();
    $role_employee->name = 'Super Admin';
    $role_employee->description = 'Super Admin is for developers';
    $role_employee->save();

    $role_employee = new Role();
    $role_employee->name = 'Admin';
    $role_employee->description = 'Admin role is for administrators';
    $role_employee->save();

    $role_employee = new Role();
    $role_employee->name = 'Learner';
    $role_employee->description = 'Learner`s role is students who will be doing the course';
    $role_employee->save();

    $role_employee = new Role();
    $role_employee->name = 'Trainer';
    $role_employee->description = 'Trainer role for course trainers and markers';
    $role_employee->save();

    $role_employee = new Role();
    $role_employee->name = 'Moderator';
    $role_employee->description = 'Moderator role for course Moderators';
    $role_employee->save();

    $role_employee = new Role();
    $role_employee->name = 'OCN';
    $role_employee->description = 'OCN role for course OCN';
    $role_employee->save();

    $role_employee = new Role();
    $role_employee->name = 'Commissioner';
    $role_employee->description = 'Commissioner role for Commissioners who will be booking courses for the learners';
    $role_employee->save();
  }
}
