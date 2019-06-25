<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Assignment;
use Faker\Generator as Faker;

$factory->define(Assignment::class, function (Faker $faker) {
    return [
        'course_id' => function (){
            return factory(App\Course::class)->create()->id;
        },
        'title' => $faker->sentence(3),
        'description' => $faker->sentence(8),
        'type' => 'pre',
    ];
});
