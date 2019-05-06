<?php

namespace Tests\Feature\Http\Controllers;

use App\User;
use Faker\Factory;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Auth\Authenticatable;

class CourseTypeControllerTest extends TestCase
{
    // use RefreshDatabase;
    use WithoutMiddleware; // use this trait
    /**
     * A basic feature test example.
     *
     * @test
     */
    public function canCreateCourseType()
    {
        $faker = Factory::create();
        $user = User::where('email', 'sivayuges@gmail.com')->first();
        $this->be($user);
        $response = $this->post(route('courseTypes.store'), [
            'title' => $title = $faker->sentence(3),
            'body' => $body = $faker->paragraph(100),
            'description' => $description = $faker->paragraph,
            'enable_megamenu' => 1,
            'status' => 'publish',
            'position' => $position = 2,

        ]);

        $response->assertSee($title);

        // $this->assertDatabaseHas('course_types', [
        //     'title' => $title,
        //     'body' => $body,
        //     'description' => $description,
        //     'enable_megamenu' => 1,
        //     'status' => 'publish',
        //     'position' => $position,
        // ]);
    }
}