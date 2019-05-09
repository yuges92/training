<?php

namespace Tests\Feature\Http\Controllers;

use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class CourseControllerTest extends TestCase
{

    // use RefreshDatabase;
    use WithoutMiddleware; // use this trait

    /**
     * A basic feature test example.
     *
     * @test
     */
    public function can_create_course()
    {
        Storage::fake('public');
        $this->actingAs($this->user);
        $data = [
            'course_code' => 'TAL2',
            'course_type_id' => 1,
            'title' =>  $this->faker->sentence(3),
            'description' => $this->faker->paragraph,
            'enable_megamenu' => 1,
            'status' => 'publish',
            'position' => 2,
            'image' => $file = UploadedFile::fake()->image('image.jpg', 1, 1)

        ];
        $response = $this->post(route('storeCourse'), $data);
        $data = array_except($data, 'image');
        $this->assertDatabaseHas('courses', $data);
        $response->assertSessionHas('success')
            ->assertStatus(302);
        $data = array_except($data, 'image');
        $this->get('/admin/courses')->assertSee($data['title']);
    }

    
}
