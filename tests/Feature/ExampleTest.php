<?php

namespace Tests\Feature;

use App\Models\Service;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    use RefreshDatabase;

    public function test_services_are_listed()
    {
        Service::factory()->count(3)->create();

        $response = $this->getJson('/api/services');

        $response->assertStatus(200);
    }

}
