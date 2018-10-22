<?php

use Faker\Generator as Faker;
use App\ClassEvent;
use Carbon\Carbon;
$factory->define(ClassEvent::class, function (Faker $faker) {
  $startDate = Carbon::createFromTimeStamp($faker->dateTimeBetween('-30 days', '+30 days')->getTimestamp());
    $endDate = Carbon::createFromFormat('Y-m-d H:i:s', $startDate)->addHour();
    $title=$faker->unique()->realText(40);
    return [
      'course_id' => 1,
      'address_id' => 1,
      'title' => $title,
      'slug' => str_slug($title),
      'description' => $faker->text,
      'startDate' => $startDate,
      'startTimeStart' => '12:00',
      'endTimeStart' => '10:00',
      'endDate' => $endDate,
      'startTimeEnd' => '10:30',
      'endTimeEnd' => '12:30',
      'type' => 'public',
      'space' => 15,
      'availableSpace' => 15,
      'price' => 150,
      'createdBy' => 1
    ];
});
