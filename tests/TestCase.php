<?php

namespace Tests;

use App\Role;
use App\User;
use Faker\Factory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{


    use CreatesApplication;
    use RefreshDatabase;


    protected  function setUp():void 
    {
        parent::setUp(); 
        if(config('app.env') !== 'testing') {
            $this->fail('Not in testing environment according to APP_ENV. Aborting');
            die(1);
        }
        
        // $this->artisan('migrate:refresh');
        Storage::fake('public');
        $this->artisan('db:seed');
        $this->faker = Factory::create();
        $this->user = User::where('email', 'admin@training.dlf.org.uk')->first();

        // dd(Role::all());
        // $this->withoutExceptionHandling();

    }
}
