<?php

use Illuminate\Database\Seeder;

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('courses')->insert([
        'title' => 'Course Test 1',
        'slug' => str_slug('Course Test 1'),
        'type' => 'course',
         'body' => 'Body',
         'description' => 'Course',
         'createdBy' => 1,
     ]);
     
    }
}
