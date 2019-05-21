<?php

use App\CourseType;
use Illuminate\Database\Seeder;

class CourseTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courseType = new CourseType();
        $courseType->title = 'Trusted Assessor';
        $courseType->slug = str_slug('Trusted Assessor');
        $courseType->body = 'body';
        $courseType->description = 'description';
        $courseType->position = 1;
        $courseType->createdBy = 1;
        $courseType->save();

        $courseType = new CourseType();
        $courseType->title = 'Another course Type';
        $courseType->slug = str_slug('Another course Type');
        $courseType->body = 'body';
        $courseType->description = 'description';
        $courseType->enable_megamenu = 1;
        $courseType->position = 2;
        $courseType->createdBy = 1;
        $courseType->save();

        $courseType = new CourseType();
        $courseType->title = 'My Course';
        $courseType->slug = str_slug('My Course');
        $courseType->body = 'body';
        $courseType->status = 'private';
        $courseType->description = 'description';
        $courseType->enable_megamenu = 1;
        $courseType->position = 3;
        $courseType->createdBy = 1;
        $courseType->save();
    }
}