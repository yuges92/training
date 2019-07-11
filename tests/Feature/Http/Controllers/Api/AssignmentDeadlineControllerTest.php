<?php

namespace Tests\Feature\Http\Controllers\Api;

use App\Assignment;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\ClassEvent;
use Illuminate\Support\Facades\Log;

class AssignmentDeadlineControllerTest extends TestCase
{
    /**
     * @test
     */
    public function can_create_assignmentDeadline()
    {
        $assignment = factory(Assignment::class)->create();
        $classEvent = factory(ClassEvent::class)->create();
        $this->actingAs($this->user, 'api');
        $data=[
            'date'=>$this->faker->date,
        ];
        // Log::info($assignment);
        $response = $this->postJson(route('deadline.store', [$classEvent->id,$assignment->id] ), $data);
        $response->assertStatus(201);
        $responseData = $response->decodeResponseJson();

        $this->assertDatabaseHas('assignment_deadline',[
            'assignment_id'=>$assignment->id,
            'class_id'=>$classEvent->id,
            'date'=>$data['date'],
        ]);
    }
}
