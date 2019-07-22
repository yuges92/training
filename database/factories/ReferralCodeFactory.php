<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\ReferralCode;
use Faker\Generator as Faker;

$factory->define(ReferralCode::class, function (Faker $faker) {
    return [
        'name' =>$faker->unique()->company,
        'description' => $faker->sentence(5),
    ];
});
