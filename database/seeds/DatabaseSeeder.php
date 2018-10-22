<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
          RoleTableSeeder::class,
          ClassAddressTableSeeder::class,
          UsersTableSeeder::class,
          CourseTableSeeder::class,
          ClassEventSeeder::class,
          // UsersTableSeeder::class,
          // UsersTableSeeder::class,


        ]);
    }
}
