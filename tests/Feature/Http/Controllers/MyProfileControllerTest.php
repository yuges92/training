<?php

namespace Tests\Feature\Http\Controllers;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MyProfileControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     * @test
     */
    public function can_update_my_profile()
    {
        $this->actingAs($this->user);
        $data=[
            'firstName' => $this->faker->firstName,
            'lastName' => $this->faker->lastName,
            'username' => $this->faker->unique()->username,
            'email' => $this->faker->unique()->safeEmail,
        ];
        $response = $this->postJson(route('myProfile.update'), $data);
        $response->assertStatus(200);
        $this->assertDatabaseHas('users',$data);
        $this->get(route('myProfile.index'))
        ->assertSee($data['firstName'])
        ->assertSee($data['lastName']);
    }


    /**
     * @test
     */
    public function can_change_password()
    {
        $user=factory(User::class)->create();
        $this->actingAs($user);
        $data=[
            'current_password' => 'secret',
            'password' => $password=$this->faker->password,
            'password_confirmation' => $password,
        ];
        $response = $this->postJson(route('myProfile.changePassword'), $data);
        $response->assertStatus(200);
    }
}
