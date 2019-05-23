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
        //  Storage::fake('public');
        $course = factory(Course::class)->create();
        $data = [
            'title' => $this->faker->sentence(3),
            'filename' => UploadedFile::fake()->create('document.pdf', 100)
        ];
        $response = $this->postJson(route('courseDocuments.store', $course->id), $data);
        $response->assertSuccessful()
            ->assertStatus(201);
        $response = $response->decodeResponseJson();

        $this->assertDatabaseHas('course_documents', [
            'title' => $data['title'],
            'filename' => $data['filename']->getClientOriginalName(),
            'course_id' => $course->id
        ]);
        // Storage::disk('public')->assertExists( $response['filename']);
        Storage::disk('public')->assertExists(CourseDocument::getFolderName(), $response['filename']);

    }


    /**
     * 
     *
     * @test
     */
    public function can_delete_a_document()
    {
        $course = factory(Course::class)->create();
        $data = [
            'title' => $this->faker->sentence(3),
            'filename' => UploadedFile::fake()->create('document.pdf', 100)
        ];
        $response = $this->postJson(route('courseDocuments.store', $course->id), $data);
        $response->assertSuccessful()
            ->assertStatus(201);
        $responseData = $response->decodeResponseJson();

        $this->assertDatabaseHas('course_documents', [
            'title' => $data['title'],
            'filename' => $data['filename']->getClientOriginalName(),
            'course_id' => $course->id
        ]);
        
        Storage::disk('public')->assertExists(CourseDocument::getFolderName(), $responseData['filename']);
// dump($responseData);
// dump($responseData['storedName']);
        $response = $this->deleteJson(route('courseDocuments.destroy',[$course->id,$responseData['id']]));
        $response->assertStatus(200);
        Storage::disk('public')->assertMissing(CourseDocument::getFolderName().$responseData['filename']);

        $this->assertDatabaseMissing('course_documents', [
            'title' => $data['title'],
            'filename' => $data['filename']->getClientOriginalName(),
            'course_id' => $course->id
        ]);

    }
}
