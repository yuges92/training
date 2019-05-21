<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Course;
use App\CourseDocument;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Storage;

$factory->define(CourseDocument::class, function (Faker $faker) {
    $storedName = uniqid().'.pdf';
    Storage::copy('testingFiles/Test-File.pdf', CourseDocument::getFolderName().$storedName);
    return [
        'course_id'=>factory(Course::class)->create()->id,
        'title'=>$faker->sentence(3),
        'filename'=>$faker->sentence(3).'pdf',
        'storedName'=>$storedName,
    ];
});
