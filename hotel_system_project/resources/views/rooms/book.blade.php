@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h2 class="mb-4" style="color: #9a616d;">Booking Details for Room: {{ $room->address }}</h2>

            <form action="{{ route('rooms.book', $room->id) }}" method="POST">
                @csrf

                <!-- Guest's name -->
                <div class="form-group mb-3">
                    <label for="guest_name">Your Name</label>
                    <input type="text" name="guest_name" id="guest_name" class="form-control" required>
                </div>

                <!-- Guest's email -->
                <div class="form-group mb-3">
                    <label for="guest_email">Your Email</label>
                    <input type="email" name="guest_email" id="guest_email" class="form-control" required>
                </div>

                <!-- Guest's phone -->
                <div class="form-group mb-3">
                    <label for="guest_phone">Your Phone Number</label>
                    <input type="text" name="guest_phone" id="guest_phone" class="form-control" required>
                </div>

                <!-- Start date -->
                <div class="form-group mb-3">
                    <label for="start_date">Start Date</label>
                    <input type="date" name="start_date" id="start_date" class="form-control" required>
                </div>

                <!-- End date -->
                <div class="form-group mb-3">
                    <label for="end_date">End Date</label>
                    <input type="date" name="end_date" id="end_date" class="form-control" required>
                </div>

                <!-- Number of guests -->
                <div class="form-group mb-3">
                    <label for="guests">Number of Guests</label>
                    <input type="number" name="guests" id="guests" class="form-control" required>
                </div>

                <!-- Submit button -->
                <button type="submit" class="btn" style="background-color: #9a616d; color: white;">Book Now</button>
            </form>
        </div>
    </div>
</div>
@endsection
