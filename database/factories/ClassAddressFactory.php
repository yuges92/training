<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\ClassAddress;
use Faker\Generator as Faker;

$factory->define(ClassAddress::class, function (Faker $faker) {
    return [
        'line1'=> $faker->streetAddress,
        'line2'=> $faker->streetName,
        'town'=> $faker->streetName,
        'county'=> 'Middlesex',
        'postcode'=> $faker->postcode,
        'country'=> 'United Kingdom',
        'createdBy'=> 1,
    ];
});
