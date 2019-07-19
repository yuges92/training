<?php

namespace Tests\Feature\Http\Controllers;

use App\User;
use Tests\TestCase;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserControllerTest extends TestCase
{
    /**
     * 
     *
     * @test
     */
    public function can_create_new_user()
    {
        $this->actingAs($this->user);
        $data = [
            'firstName' => $this->faker->firstName,
            'lastName' => $this->faker->lastName,
            'username' => $this->faker->unique()->userName,
            'email' =>  $this->faker->unique()->safeEmail,
            'status' =>  'pending',
            'role' => '3',
        ];
        $response = $this->post(route('users.store', $data));
        $response->assertStatus(302)
            ->assertSessionHas('success');
        $data = array_except($data, 'role');
        $this->assertDatabaseHas('users', $data);
    }


    /**
     * 
     *
     * @test
     */
    public function can_update_a_user()
    {
        $this->actingAs($this->user);
        $userUpdate = factory(User::class)->create();
        $userUpdate->roles()->attach([1]);
        
        $this->assertNotEmpty($userUpdate);
        $data = [
            'firstName' => $this->faker->firstName,
            'lastName' => $this->faker->lastName,
            'email' =>  $this->faker->unique()->safeEmail,
            'role' => '4',
            'status' =>  'approved',

        ];

        $response = $this->putJson(route('users.update', $userUpdate->id), $data);
        $response->assertStatus(302)
            ->assertSessionHas('success');
        $data = array_except($data, 'role');
        $this->assertDatabaseHas('users', $data);
    }
}
