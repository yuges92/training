<?php

namespace Tests\Feature\Http\Controllers\Api;

use App\Course;
use Tests\TestCase;
use App\CourseDocument;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CourseDocumentControllerTest extends TestCase
{
    /**
     *
     *
     * @test
     */
    public function can_add_a_document_to_a_course()
    {
         Storage::fake('public');
        $course = factory(Course::class)->create();
        $data = [
            'title' => $this->faker->sentence(3),
            'filename' => UploadedFile::fake()->create('document.pdf', 100)
        ];
        $response=$this->postJson(route('courseDocuments.store', $course->id), $data);
        $response ->assertSuccessful()
        ->assertStatus(201);
           $response=$response->decodeResponseJson();
            
            $this->assertDatabaseHas('course_documents', [
                'title'=>$data['title'],
                'filename'=>$data['filename']->getClientOriginalName(),
                'course_id'=>$course->id
            ]);
        Storage::disk('public')->assertExists(CourseDocument::getFolderName(),$response['storedName']);
    }
}
