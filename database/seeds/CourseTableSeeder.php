<?php

use Illuminate\Database\Seeder;
use App\Course;

class CourseTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    //   DB::table('courses')->insert([
    //     'title' => 'Course Test 1',
    //     'slug' => str_slug('Course Test 1'),
    //     'course_type_id' => 1,
    //     'course_code' => 125,
    //     'status' => 'publish',
    //     // 'type' => 'course',
    //      'body' => 'Body',
    //      'description' => 'Course',
    //      'createdBy' => 1,
    //  ]);

    $course = new Course();
    $course->course_code = 'TAL1';
    $course->course_type_id = 1;
    $course->title = 'Course Test 1';
    $course->slug = str_slug('Course Test 1');
    $course->status = 'publish';
    $course->enable_megamenu = 1;
    $course->position = 1;
    $course->password = '';
    $course->description = 'description';
    $course->createdBy = 1;
    $course->save();


    $course = new Course();
    $course->course_code = 'TAL2';
    $course->course_type_id = 1;
    $course->title = 'Course Test 2';
    $course->slug = str_slug('Course Test 2');
    $course->status = 'publish';
    $course->enable_megamenu = 1;
    $course->position = 2;
    $course->password = '';
    $course->description = 'description';
    $course->createdBy = 1;
    $course->save();
  }
}