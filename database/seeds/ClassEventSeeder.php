<?php

use Illuminate\Database\Seeder;
use App\ClassEvent;
class ClassEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(ClassEvent::class, 5)->create();

    //   factory(App\ClassEvent::class, 5)->create()->each(function ($u) {
    //     $role_learner = Role::where('name', 'Learner')->first();
    //     $u->roles()->attach($role_learner);
     //
    //  });
    }
}
