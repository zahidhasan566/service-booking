<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\BookingConfirmed;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        // Add validation and catch exceptions
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'phone' => 'required|string|max:20',
                'service_id' => 'required|exists:services,id',
                'schedule_time' => 'required|date',
            ]);

            // Create the booking
            $booking = Booking::create([
                'name' => $validated['name'],
                'phone' => $validated['phone'],
                'service_id' => $validated['service_id'],
                'schedule_time' => $validated['schedule_time'],
                'status' => 'pending',
            ]);

            Mail::to($booking->email)->send(new BookingConfirmed($booking));


            // Return success response
            return response()->json($booking, 201);
        } catch (\Exception $e) {
            // Log the error
            \Log::error("Booking creation failed: " . $e->getMessage());

            // Return error response
            return response()->json(['error' => 'Booking creation failed'], 500);
        }
    }

    public function show($id)
    {
        $booking = Booking::findOrFail($id);
        return response()->json($booking);
    }
}
