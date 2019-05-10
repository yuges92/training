<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\CourseBody;
use Faker\Generator as Faker;

$factory->define(CourseBody::class, function (Faker $faker) {
    return [
        'title'=> $faker->sentence(3),
        'content'=>$faker->paragraph(400),
        'course_id'=>1,
        'createdBy'=>1
    ];
});
