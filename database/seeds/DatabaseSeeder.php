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
          UsersTableSeeder::class,
          CourseTypeTableSeeder::class,
          // ClassAddressTableSeeder::class,
          // CourseTableSeeder::class,
          // ClassEventSeeder::class,


        ]);
    }
}
