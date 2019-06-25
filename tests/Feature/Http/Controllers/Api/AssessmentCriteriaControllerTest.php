<?php

namespace Tests\Feature\Http\Controllers\Api;

use App\Course;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\AssessmentCriteria;

class AssessmentCriteriaControllerTest extends TestCase
{
    /**
     *
     * @test
     */
    public function can_add_a_criteria()
    {
        $this->actingAs($this->user, 'api');
        $course = factory(Course::class)->create();
        $data = [
            'course_id' => $course->id,
            'number' => '1.5',
            'description' => $this->faker->sentence(3),
        ];

        $response = $this->postJson(route('assessmentCriterias.store', $course->id), $data);
        $response->assertStatus(201);
        $this->assertDatabaseHas('assessment_criterias', $data);
    }

    /**
     * @test
     */
    public function can_get_assesment_criterias()
    {
        $criteria = factory(AssessmentCriteria::class)->create();
        $this->actingAs($this->user, 'api');
        $response = $this->getJson(route('assessmentCriterias.index', $criteria->course_id));
        $response->assertStatus(201);
        $responseData = $response->decodeResponseJson();
        $this->assertEquals(1, count($responseData));

    }


        /**
     * @test
     */
    public function can_update_a_assignment()
    {
        $criteria = factory(AssessmentCriteria::class)->create();
        $this->actingAs($this->user, 'api');
        $data = [
            'number' => '1.5',
            'description' => $this->faker->sentence(3),
        ];
        $response = $this->putJson(route('assessmentCriterias.update', [$criteria->course_id,$criteria->id]), $data);
        $response->assertStatus(201);
        $this->assertDatabaseHas('assessment_criterias', $data);
    }

    /**
     * @test
     */
    public function can_delete_a_criteria()
    {
        $criteria = factory(AssessmentCriteria::class)->create();
        $this->actingAs($this->user, 'api');
        $response = $this->deleteJson(route('assessmentCriterias.destroy', [$criteria->course_id,$criteria->id]));
        $response->assertStatus(200);
        $this->assertDatabaseMissing('assessment_criterias',[
            'id'=>$criteria->id,
            'course_id'=>$criteria->course_id,
            'number'=>$criteria->number,
            'description'=>$criteria->description
        ]);

    }
}
