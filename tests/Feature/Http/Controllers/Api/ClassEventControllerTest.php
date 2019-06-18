<?php

namespace Tests\Feature\Http\Controllers\Api;

use App\Role;
use App\Course;
use App\ClassDate;
use Carbon\Carbon;
use App\ClassEvent;
use Tests\TestCase;
use App\ClassAddress;
use App\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Trainer;
use Illuminate\Support\Facades\Log;

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
            'type' => 'private',
            'address_id' => factory(ClassAddress::class)->create()->id,
            'title' => $title = $this->faker->sentence(3),
            'slug' => str_slug($title),
            'description' => $this->faker->paragraph(3),
            // 'duration'=>2,
            'availableSpace' => '10',
            'price' => '178.0',
            'space' => '15',
        ];
        $response = $this->putJson(route('classEvents.update', $class->id), $data);
        $response->assertStatus(201);
        $classUpdated = ClassEvent::find($class->id);
        $this->assertDatabaseHas('class_events', $data);
        $this->assertEquals($classUpdated->course_id, $data['course_id']);
        $this->assertEquals($classUpdated->type, $data['type']);
        $this->assertEquals($classUpdated->address_id, $data['address_id']);
        $this->assertEquals($classUpdated->title, $data['title']);
        // $this->assertEquals($classUpdated->duration,$data['duration']);
        $this->assertEquals($classUpdated->description, $data['description']);
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
            'day' => rand(1, 5),
            'date' => Carbon::now()->subMinutes(rand(1, 55)),
            'startTime' => '12:00',
            'endTime' => '17:00',

        ];
        $response = $this->postJson(route('classDates.store', $class->id), $data);
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
        $classDates = ClassDate::where('class_id', $classDate->class_id)->get();
        $response = $this->getJson(route('classDates.index', $classDate->class_id));
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
            'day' => rand(1, 5),
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
        $response = $this->deleteJson(route('classDates.destroy', [$classDate->class_id, $classDate->id]));
        $response->assertStatus(200);
        $this->assertDatabaseMissing('class_dates', ['id' => $classDate->id]);
    }



    /**
     * 
     *
     * @test
     */
    public function can_get_all_trainers()
    {
        $this->actingAs($this->user, 'api');
        $role_Trainer = Role::where('name', 'Trainer')->first();
        $trainers =   factory(User::class, 10)->create()->each(function ($user) use ($role_Trainer) {
            $user->roles()->attach($role_Trainer);
        });
        // Log::info($trainers);
        $trainers = Trainer::all();
        $response = $this->getJson(route('trainers.index'));
        $response->assertStatus(201);
        $responseData = $response->decodeResponseJson();
        // Log::warning($responseData);
        $this->assertEquals(count($trainers), count($responseData));
    }


    /**
     * @test
     */
    public function can_add_a_trainer()
    {
        $this->actingAs($this->user, 'api');
        $class = factory(ClassEvent::class)->create();
        $role_Trainer = Role::where('name', 'Trainer')->first();
        $trainer =   factory(User::class)->create();
        $trainer->roles()->attach($role_Trainer);

        $data = [
            'class_id' => $class->id,
            'user_id' => $trainer->id,
            'type' => 'Primary'
        ];

        $response = $this->postJson(route('classes.trainers.store', $class->id), $data);
        // dump($response);
        $response->assertStatus(201);

        $this->assertDatabaseHas('classEvent_trainer', $data);
    }


    /**
     * @test
     */
    public function can_get_a_trainer()
    {
        $this->actingAs($this->user, 'api');
        $class = factory(ClassEvent::class)->create();
        $role_Trainer = Role::where('name', 'Trainer')->first();
        $trainer =   factory(User::class)->create();
        $trainer->roles()->attach($role_Trainer);

        $data = [
            'class_id' => $class->id,
            'user_id' => $trainer->id,
            'type' => 'Primary'
        ];

        $this->postJson(route('classes.trainers.store', $class->id), $data);
        $response = $this->postJson(route('classes.trainers.get', $class->id), $data);
        $response->assertStatus(201);
        $responseData = $response->decodeResponseJson();
        // dump($responseData['roles'][0]['pivot']['']);
        $this->assertEquals($data['user_id'], $responseData['id']);
        // $this->assertEquals($data['class_id'], $responseData['roles'][0]['pivot']);

        
    }

/**
 * @test
 */
    public function can_delete_a_trainer()
    {
        $this->actingAs($this->user, 'api');
        $class = factory(ClassEvent::class)->create();
        $role_Trainer = Role::where('name', 'Trainer')->first();
        $trainer =   factory(User::class)->create();
        $trainer->roles()->attach($role_Trainer);

        $data = [
            'class_id' => $class->id,
            'user_id' => $trainer->id,
            'type' => 'Primary'
        ];

        $this->postJson(route('classes.trainers.store', $class->id), $data);
        $response = $this->deleteJson(route('classes.trainers.destroy', $class->id), $data);
        $response->assertStatus(201);

        $this->assertDatabaseMissing('classEvent_trainer', $data);

        
    }

}
