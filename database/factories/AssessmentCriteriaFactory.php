<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\AssessmentCriteria;
use Faker\Generator as Faker;

$factory->define(AssessmentCriteria::class, function (Faker $faker) {
    return [
        'number' => floatVal(rand(1, 10).'.'.rand(1, 9)),
        'course_id' => function (){
            return factory(App\CourseType::class)->create()->id;
        },
        'description' => $faker->sentence(3),
    ];
});
