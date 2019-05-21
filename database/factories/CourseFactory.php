<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Course;
use Faker\Generator as Faker;

$factory->define(Course::class, function (Faker $faker) {
    return [
        'course_code' => $faker->ean8,
        'course_type_id' => function (){
            return factory(App\CourseType::class)->create()->id;
        },
        'title' => $title = $faker->sentence(3),
        'slug' => str_slug($title),
        'status' => 'publish',
        'enable_megamenu' => '1',
        'position' => '1',
        'password' => '',
        'description' => $faker->paragraph(100),
        'createdBy' => 1,
    ];
});
