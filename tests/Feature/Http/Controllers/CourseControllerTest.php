<?php

namespace Tests\Feature\Http\Controllers;

use Tests\TestCase;
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


        $this->assertTrue(true);
    }
}