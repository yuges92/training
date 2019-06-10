<?php

namespace Tests\Feature\Http\Controllers\Api;

use App\Course;
use Carbon\Carbon;
use App\ClassEvent;
use Tests\TestCase;
use App\ClassAddress;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\ClassDate;

class ClassEventControllerTest extends TestCase
{
    /**
     *
     * @test
     */
    public function can_get_class()
    {
        $this->actingAs($this->user, 'api');
        $class = factory(ClassEvent::class)->create();
        $response = $this->getJson("/api/classEvents/$class->id");
        $responseData = $response->decodeResponseJson();
        $response->assertStatus(200);
        $this->assertEquals($class->title, $responseData['title']);
        $this->assertEquals($class->id, $responseData['id']);
    }

    /**
     * @test
     */

    public function can_update_a_class()
    {
        $this->actingAs($this->user, 'api');
        $class = factory(ClassEvent::class)->create();
        $data = [
            'course_id' => factory(Course::class)->create()->id,
            'type'=>'private',
            'address_id' => factory(ClassAddress::class)->create()->id,
            'title' => $title = $this->faker->sentence(3),
            'slug' => str_slug($title),
            'description' => $this->faker->paragraph(3),
            // 'duration'=>2,
            'availableSpace' => '10',
            'price' => '178.0',
            'space' => '15',
        ];
        $response=$this->putJson(route('classEvents.update', $class->id), $data);
        $response->assertStatus(201);
        $classUpdated=ClassEvent::find($class->id);
        $this->assertDatabaseHas('class_events', $data);
        $this->assertEquals($classUpdated->course_id,$data['course_id']);
        $this->assertEquals($classUpdated->type,$data['type']);
        $this->assertEquals($classUpdated->address_id,$data['address_id']);
        $this->assertEquals($classUpdated->title,$data['title']);
        // $this->assertEquals($classUpdated->duration,$data['duration']);
        $this->assertEquals($classUpdated->description,$data['description']);


    }

/**
 * 
 *
 * @test
 */
    public function can_add_class_date()
    {
        $this->actingAs($this->user, 'api');        
        $class = factory(ClassEvent::class)->create();
        $data = [
            'class_id' => $class->id,
            'day' => rand(1,5),
            'date' => Carbon::now()->subMinutes(rand(1, 55)),
            'startTime' => '12:00',
            'endTime' => '17:00',

        ];
        $response=$this->postJson(route('classDates.store', $class->id), $data);
        $responseData = $response->decodeResponseJson();
        $response->assertStatus(201);
        $this->assertEquals($data['class_id'], $responseData['class_id']);
        $this->assertEquals($data['day'], $responseData['day']);
        // $this->assertEquals($data['date'], $responseData['date']);
        $this->assertEquals($data['startTime'], $responseData['startTime']);

    }


        /**
     *
     * @test
     */
    public function can_get_class_dates()
    {
        $this->actingAs($this->user, 'api');
        
        $classDate = factory(ClassDate::class)->create();
        $classDates=ClassDate::where('class_id', $classDate->class_id)->get();
        $response = $this->getJson(route('classDates.index',$classDate->class_id));
        $response->assertStatus(201);
        $responseData = $response->decodeResponseJson();
        $this->assertEquals(count($classDates), count($responseData));
    }


            /**
     * 
     *
     * @test
     */
    public function can_update_class_date()
    {
        $this->actingAs($this->user, 'api');
        $classDate = factory(ClassDate::class)->create();
        $data = [
            'day' => rand(1,5),
            'date' => Carbon::now()->subMinutes(rand(1, 55)),
            'startTime' => '12:00',
            'endTime' => '17:00',

        ];
        $response = $this->putJson(route('classDates.update', [$classDate->class_id, $classDate->id]), $data);
        $response->assertStatus(201);
        $responseData = $response->decodeResponseJson();
        $this->assertEquals($data['day'], $responseData['day']);
        // $this->assertEquals($data['date'], $responseData['date']);
        $this->assertEquals($data['startTime'], $responseData['startTime']);
    }


    /**
     * 
     *
     * @test
     */
    public function can_delate_a_class_date()
    {
        $this->actingAs($this->user, 'api');         
        $classDate = factory(ClassDate::class)->create();
        $response= $this->deleteJson(route('classDates.destroy', [$classDate->class_id, $classDate->id]));
        $response->assertStatus(200);
        $this->assertDatabaseMissing('class_dates', ['id' => $classDate->id]);


    }



}


