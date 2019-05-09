<?php

namespace Tests;

use App\Role;
use App\User;
use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{


    use CreatesApplication;
    use RefreshDatabase;
    // use WithoutMiddleware; // use this trait


    protected  function setUp():void 
    {
        parent::setUp(); 
        // $this->artisan('migrate:refresh');
        $this->artisan('db:seed');
        $this->faker = Factory::create();
        $this->user = User::where('email', 'admin@training.dlf.org.uk')->first();

        // dd(Role::all());
        $this->withoutExceptionHandling();

    }
}
