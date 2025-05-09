<?php

namespace Tests\Feature;

use App\Models\Booking;
use App\Models\Service;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BookingTest extends TestCase
{
    use RefreshDatabase;

    public function test_customer_can_book_a_service()
    {
        $service = Service::factory()->create();

        $response = $this->postJson('/api/bookings', [
            'name' => 'Zahid',
            'phone' => '01974601166',
            'service_id' => $service->id,
            'schedule_time' => now()->addDay()->toDateTimeString(), // ← FIXED
        ]);

        $response->assertStatus(201);
        $response->assertJsonStructure([
            'id', 'name', 'phone', 'service_id', 'status', 'schedule_time',
        ]);
    }
    public function test_customer_can_track_booking_status()
    {
        $booking = Booking::factory()->create();

        $response = $this->getJson("/api/bookings/{$booking->id}");

        $response->assertStatus(200);
        $response->assertJsonFragment([
            'id' => $booking->id,
            'status' => $booking->status,
        ]);
    }

}
