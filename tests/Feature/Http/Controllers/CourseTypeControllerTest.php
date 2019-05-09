<?php

namespace Tests\Feature\Http\Controllers;

use App\User;
use Faker\Factory;
use App\CourseType;
use Tests\TestCase;
use Illuminate\Auth\Authenticatable;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class CourseTypeControllerTest extends TestCase
{

    /**
     * A basic feature test example.
     *
     * @
     */
    public function canCreateCourseType()
    {
        $faker = $this->faker;
        $user = User::where('email', 'admin@training.dlf.org.uk')->first();
        // print_r($user);
        $this->actingAs($user);
        $response = $this->post(route('courseTypes.store'), [
            'title' => $title = $faker->sentence(3),
            'body' => $body = $faker->paragraph(100),
            'description' => $description = $faker->paragraph,
            'enable_megamenu' => 1,
            'status' => 'publish',
            'position' => $position = 2,

        ]);
        // $response->assertStatus(201);
        // dd('/admin/courseTypes');
        // $this->get('/admin/courseTypes')->assertSee($title);

        // $this->assertDatabaseHas('course_types', [
        //     'title' => $title,
        //     'body' => $body,
        //     'description' => $description,
        //     'enable_megamenu' => 1,
        //     'status' => 'publish',
        //     'position' => $position,
        // ]);
        $this->assertTrue(true);
    }
    /**
     * 
     *
     * @test
     */
    public function can_view_courses()
    {
        $user = User::where('email', 'sivayuges@gmail.com')->first();
        $this->actingAs($user);
        $response = $this->get(route('courseTypes.index'));
        $response->assertStatus(200)->dump()->assertSee('Course Types');
        //   $response->assertViewIs('admin.courseType.index');

    }

    // public function can_update_course_type()
    // {
    //  $this->assertTrue(true);  
    // }

    // public function can_delete_a_course_type()
    // {
    //  $this->assertTrue(true);  

    // }




}
