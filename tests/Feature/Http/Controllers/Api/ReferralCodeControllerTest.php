<?php

namespace Tests\Feature\Http\Controllers\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Log;
use App\ReferralCode;

class ReferralCodeControllerTest extends TestCase
{

    /**
     * @test
     */
    public function can_create_referre_code()
    {
        $this->actingAs($this->user, 'api');
        $data = [
            'name' => $this->faker->unique()->company,
            'description' => $this->faker->sentence(5),
        ];
        $response = $this->postJson(route('referralCode.store'), $data);
        $response->assertStatus(201);
        $this->assertDatabaseHas('referral_codes', $data);
    }

    /**
     * @test
     */
    public function can_update_referre_code()
    {
        $this->actingAs($this->user, 'api');
        $referralCode = factory(ReferralCode::class)->create();
        $data = [
            'name' => $this->faker->unique()->company,
            'description' => $this->faker->sentence(5),
        ];
        $response = $this->putJson(route('referralCode.update', $referralCode->id), $data);
        $response->assertStatus(201);
        $this->assertDatabaseHas('referral_codes', $data);
    }

    /**
     * @test
     */
    public function can_delete_referre_code()
    {
        $this->actingAs($this->user, 'api');
        $referralCode = factory(ReferralCode::class)->create();

        $response = $this->deleteJson(route('referralCode.destroy', $referralCode->id));
        $response->assertStatus(204);
        $this->assertDatabaseMissing('referral_codes', [
            'id' => $referralCode->id,
            'name' => $referralCode->name,
            'description' => $referralCode->description,
        ]);
    }


        /**
     * @test
     */
    public function can_get_referre_codes()
    {
        $this->actingAs($this->user, 'api');
        $referralCodes = factory(ReferralCode::class,5)->create();

        $response = $this->getJson(route('referralCode.index'));
        $response->assertStatus(201);
        $responseData = $response->decodeResponseJson();
        $this->assertEquals($referralCodes->count(), count($responseData));


    }



}
