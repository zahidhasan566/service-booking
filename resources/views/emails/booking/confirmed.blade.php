@component('mail::message')
    # Booking Confirmed

    Hi {{ $booking->name }},

    Your booking for **{{ $booking->service->name }}** has been confirmed.

    **Scheduled Time:** {{ $booking->schedule_time }}

    Thank you for choosing us!

@endcomponent
