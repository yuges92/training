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
        $courseType= new CourseType();
        $courseType->title='Trusted Assesser';
        $courseType->slug=str_slug('Trusted Assesser');
        $courseType->body='body';
        $courseType->description='description';
        $courseType->createdBy=1;
        $courseType->save();

        $courseType= new CourseType();
        $courseType->title='Another course Type';
        $courseType->slug=str_slug('Another course Type');
        $courseType->body='body';
        $courseType->description='description';
        $courseType->createdBy=1;
        $courseType->save();
    }
}




