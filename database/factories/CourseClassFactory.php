<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\ClassEvent;
use Faker\Generator as Faker;

$factory->define(ClassEvent::class, function (Faker $faker) {
        return [
            'course_id' => function (){
                return factory(App\Course::class)->create()->id;
            },
            'address_id' => function (){
                return factory(App\ClassAddress::class)->create()->id;
            },
            'title' => $title = $faker->sentence(3),
            'slug' => str_slug($title),
            'description' =>  $faker->paragraph(5),
            'type' => 'public',
            'space' => '15',
            'availableSpace' => '15',
            // 'duration' => 1,
            'price' => 100,
            'createdBy' => 1,
            'updatedBY' => 1,
        ];
});