<?php

namespace Tests\Feature\Http\Controllers\Api;

use App\Course;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class CourseControllerTest extends TestCase
{



    /**
     * 
     *
     * @test
     */
    public function can_update_a_course()
    {
        $course = Course::find(1);
        $this->actingAs($this->user);

        $data = [
            'course_code' => $course_code = $this->faker->ean8,
            'course_type_id' => 1,
            'title' => $title = $this->faker->sentence(3),
            'description' => $description = $this->faker->paragraph,
            'enable_megamenu' => 1,
            'status' => 'publish',
            'position' => 2,
            'image' => $file = UploadedFile::fake()->image('image.jpg', 1, 1)

        ];

        $response = $this->patch(route('courses.update', $course->id), $data);
        $data['image'] = $course->id . '.jpg';
        $response
            ->assertStatus(200)
            ->assertJson($data);
        $this->assertTrue(true);
        $this->assertDatabaseHas('courses', $data);
        // Storage::disk('public')->assertExists($course->image);
        Storage::assertExists($course->image);
    }




    /**
     * @test
     */

    public function can_add_document_to_a_course()
    {
        $this->assertTrue(true);
    }



    /**
     * 
     *
     * @test
     */
    public function can_delete_a_course()
    {
        $course = Course::find(1);

        $this->deleteJson(route('courses.destroy', $course->id))
            ->assertStatus(204);
        $this->assertDatabaseMissing('courses', ['id' => $course->id]);
    }
}
