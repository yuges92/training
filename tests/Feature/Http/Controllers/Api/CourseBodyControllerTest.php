<?php

namespace Tests\Feature\Http\Controllers\Api;

use App\Course;
use App\CourseBody;
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
        $this->actingAs($this->user, 'api');        
        $this->assertNotEmpty($course);

        $data = [
            'title' => $title = $this->faker->sentence(3),
            'content' => $title = $this->faker->paragraph(500),
            'order'    => '1'

        ];
        $this->postJson(route('courses.addBody', $course->id), $data)
            ->assertSuccessful();
        $this->assertDatabaseHas('course_bodies', $data);
    }

    /**
     * 
     *
     * @test
     */
    public function can_update_course_body()
    {
        $this->actingAs($this->user, 'api');
        $courseBody = factory(CourseBody::class)->create();
        $data = [
            'title' => $title = $this->faker->sentence(3),
            'content' => $title = $this->faker->paragraph(500),
            'order'    => '1'

        ];

        $this->patchJson(route('courseBodies.update', $courseBody->id), $data)
            ->assertSuccessful();
        //    $courseBody= CourseBody::find($courseBody->id);
        $this->assertDatabaseHas('course_bodies', $data);
        // $this->assertEquals($data['title'],$courseBody->id );
    }


    /**
     * 
     *
     * @test
     */
    public function can_delete_body()
    {
        $this->actingAs($this->user, 'api');
        $courseBody = factory(CourseBody::class)->create();

        $this->deleteJson(route('courseBodies.destroy',$courseBody->id))->assertSuccessful();
        $this->assertDatabaseMissing('course_bodies', ['id' => $courseBody->id]);
    }
}
