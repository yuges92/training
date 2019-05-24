<?php

namespace Tests\Feature\Http\Controllers\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\ClassEvent;

class ClassEventControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @test
     */
    public function can_get_class()
    {
        $class=factory(ClassEvent::class)->create();
        $response = $this->getJson("/api/classEvents/$class->id");
        $responseData = $response->decodeResponseJson();
        $response->assertStatus(200);
        $this->assertEquals($class->title, $responseData['title']);
        $this->assertEquals($class->id, $responseData['id']);
    }
}
