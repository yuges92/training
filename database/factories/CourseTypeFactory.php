<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\CourseType;
use Faker\Generator as Faker;

$factory->define(CourseType::class, function (Faker $faker) {
    return [
        'title' =>$title=$faker->sentence(3),
        'slug'=>str_slug($title),
        'body'=> $faker->paragraph(100),
        'description'=>$faker->paragraph(5),
        'status'=>'publish',
        'position'=>1,
        'createdBy'=>1,
    ];
});
