<?php

namespace Tests\Feature\Http\Controllers;

use App\CourseType;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class CourseTypeControllerTest extends TestCase
{

    use WithoutMiddleware;


    /**
     * 
     *
     * @test
     */
    public function can_view_courses()
    {
        $this->actingAs($this->user);
        $response = $this->get(route('courseTypes.index'));
        $response->assertStatus(200)->assertSee('Course Types');
        $response->assertViewIs('admin.courseType.index');
    }



    /**
     * 
     *
     * @test
     */
    public function can_create_a_course_Type()
    {
        $this->actingAs($this->user);
        $data = [
            'title' =>  $this->faker->sentence(3),
            'body' => $this->faker->paragraph(100),
            'description' => $this->faker->paragraph,
            'enable_megamenu' => 1,
            'status' => 'publish',
            'position' => 2,
            'image' => $file = UploadedFile::fake()->image('image.jpg', 1, 1)

        ];
        $response = $this->post(route('courseTypes.store'), $data);
        $response->assertSessionHas('success')
        ->assertStatus(302);
        $data = array_except($data, 'image');
        $this->get('/admin/courseTypes')->assertSee($data['title']);
        $this->assertDatabaseHas('course_types', $data);
    }

    /**
     * 
     *
     * @test
     */
    public function can_update_a_course_type()
    {
        $courseType = CourseType::find(1);
        $this->actingAs($this->user);
        $data = [
            'title' =>  $this->faker->sentence(3),
            'body' => $this->faker->paragraph(100),
            'description' => $this->faker->paragraph,
            'enable_megamenu' => 1,
            'status' => 'publish',
            'position' => 2,
            'image' => $file = UploadedFile::fake()->image('differentImage.jpg', 1, 1)
        ];
        $response = $this->put(route('courseTypes.update', $courseType->id), $data);
        $response->assertSessionHas('success')
        ->assertStatus(302);
        $courseTypeUpdated = CourseType::find(1);
        $data['image'] = $courseType->id . '.jpg';

        $this->assertDatabaseHas('course_types', $data);
        $this->assertEquals($data['title'], $courseTypeUpdated->title);
        $this->assertEquals($data['body'], $courseTypeUpdated->body);
        $this->assertEquals($data['description'], $courseTypeUpdated->description);
    }


    /**
     * 
     *
     * @test
     */
    public function can_delete_a_course_type()
    {
        $courseType = CourseType::find(1);
        $response = $this->delete(route('courseTypes.destroy', $courseType->id));
        $response->assertSessionHas('success')
        ->assertStatus(302);
        $this->assertDatabaseMissing('course_types', ['id' => $courseType->id]);
    }
}
