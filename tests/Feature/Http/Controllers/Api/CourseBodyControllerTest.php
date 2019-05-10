<?php

namespace Tests\Feature\Http\Controllers\Api;

use App\Course;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CourseBodyControllerTest extends TestCase
{
 
    /**
     * @test
     */
    public function can_add_course_body()
    {
        $course = Course::find(1);
        $this->actingAs($this->user);
        $this->assertNotEmpty($course);

        $data=[
            'title'=> $title = $this->faker->sentence(3),
            'content'=>$title = $this->faker->paragraph(500),
        ];
        $this->postJson(route('courses.addBody', $course->id),$data)
        ->assertStatus(200);
        $this->assertDatabaseHas('course_bodies', $data);

    }

    public function can_update_course_body()
    {
// $course
    }

    public function can_delete_body()
    {
        
    }


}
