<?php

namespace Tests\Feature\Http\Controllers\Api;

use App\Question;
use App\Assignment;
use Tests\TestCase;
use App\AssessmentCriteria;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class QuestionControllerTest extends TestCase
{
    /**
     * @test
     */
    public function can_create_question()
    {
        $this->actingAs($this->user, 'api');
        $assignment = factory(Assignment::class)->create();
        $criterias = factory(AssessmentCriteria::class, 5)->create();
        $data = [
            'assignment_id' => $assignment->id,
            'description' => $this->faker->sentence(3),
            'number' => 12,
            'type' => 'comment',
            'criterias' => $criteria_ids = $criterias->pluck('id'),
        ];

        $response = $this->postJson(route('questions.store', $assignment->id), $data);
        $response->assertStatus(201);
        $data = array_except($data, 'criterias');
        $this->assertDatabaseHas('questions', $data);
        $responseData = $response->decodeResponseJson();
        $this->assertDatabaseHas('assessment_criteria_question', [
            'question_id' => $responseData['id'],
            'criteria_id' => $criterias->first()->id
        ]);
    }


        /**
     * @test
     */
    public function can_update_question()
    {
        $this->actingAs($this->user, 'api');
        $question = factory(Question::class)->create();
        $criterias = factory(AssessmentCriteria::class, 5)->create();
        $data = [
            'description' => $this->faker->sentence(3),
            'number' => 15,
            'type' => 'dropdown',
            'criterias' => $criteria_ids = $criterias->pluck('id'),
        ];

        $response = $this->putJson(route('questions.update', [$question->assignment_id,$question->id]), $data);
        $response->assertStatus(201);
        $data = array_except($data, 'criterias');
        $this->assertDatabaseHas('questions', $data);
        $responseData = $response->decodeResponseJson();
        $this->assertDatabaseHas('assessment_criteria_question', [
            'question_id' => $responseData['id'],
            'criteria_id' => $criterias->first()->id
        ]);
    }
}
