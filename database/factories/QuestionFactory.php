<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Question;
use Faker\Generator as Faker;

$factory->define(Question::class, function (Faker $faker) {
    return [
        'assignment_id' => function () {
            return factory(App\Assignment::class)->create()->id;
        },
        'description' => $faker->sentence(8),
        'number' => rand(1, 100),
        'type' => 'comment',
    ];
});
