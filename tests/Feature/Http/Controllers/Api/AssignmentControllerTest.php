<?php

namespace Tests\Feature\Http\Controllers\Api;

use App\Course;
use App\Assignment;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AssignmentControllerTest extends TestCase
{
    /**
     * @test
     */
    public function can_create_assignment()
    {
        $this->actingAs($this->user, 'api');
        $course = factory(Course::class)->create();
        $data = [
            'course_id' => $course->id,
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->sentence(8),
            'introduction' => $this->faker->paragraph(4),
            'type' => 'pre',
        ];

        $response = $this->postJson(route('assignments.store', $course->id), $data);
        $response->assertStatus(201);
        $this->assertDatabaseHas('assignments', $data);
    }


    /**
     * @test
     */
    public function can_get_assignments()
    {
        $assignment = factory(Assignment::class)->create();
        $this->actingAs($this->user, 'api');
        $response = $this->getJson(route('assignments.index', $assignment->course_id));
        $response->assertStatus(201);
        $responseData = $response->decodeResponseJson();
        $this->assertEquals(1, count($responseData));
    }


        /**
     * @test
     */
    public function can_get_an_assignment()
    {
        $assignment = factory(Assignment::class)->create();
        $this->actingAs($this->user, 'api');
        $response = $this->getJson(route('assignments.show', [$assignment->course_id,$assignment->id]));
        $response->assertStatus(201);
        $responseData = $response->decodeResponseJson();
        $this->assertEquals($assignment->id, ($responseData['id']));
        $this->assertEquals($assignment->title, ($responseData['title']));
        $this->assertEquals($assignment->description, ($responseData['description']));
    }


    /**
     * @test
     */
    public function can_update_a_assignment()
    {
        $assignment = factory(Assignment::class)->create();
        $this->actingAs($this->user, 'api');
        $data = [
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->sentence(8),
            'type' => 'post',
        ];
        $response = $this->putJson(route('assignments.update', [$assignment->course_id, $assignment->id]), $data);
        $response->assertStatus(201);
        $this->assertDatabaseHas('assignments', $data);
    }


    /**
     * @test
     */
    public function can_delete_a_assignment()
    {
        $assignment = factory(Assignment::class)->create();
        $this->actingAs($this->user, 'api');
        $response = $this->deleteJson(route('assignments.destroy', [$assignment->course_id, $assignment->id]));
        $response->assertStatus(200);
        $this->assertDatabaseMissing('assignments', [
            'id' => $assignment->id,
            'course_id' => $assignment->course_id,
            'title' => $assignment->title,
            'description' => $assignment->description,
            'type' => $assignment->type
        ]);
    }
}
