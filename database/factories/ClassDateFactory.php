<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\ClassDate;
use Carbon\Carbon;
use App\ClassEvent;
use Faker\Generator as Faker;

$factory->define(ClassDate::class, function (Faker $faker) {
    return [
            'class_id' => factory(ClassEvent::class)->create(),
            'day' => rand(1,5),
            'date' => Carbon::now()->subMinutes(rand(1, 55)),
            'startTime' => '12:00',
            'endTime' => '17:00',
    ];
});
