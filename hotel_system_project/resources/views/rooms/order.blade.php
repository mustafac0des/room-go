@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h2 class="mb-4" style="color: #9a616d;">Booking Details for Room: {{ $room->address }}</h2>

            <!-- Display Room Information -->
            <div class="card mb-4" style="border-color: #9a616d;">
                <div class="card-header">
                    {{ $room->address }}
                </div>
                <div class="card-body" style="background-color: #f4f1f3;">
                    @if($room->image_path) 
                        <img src="{{ asset('storage/' . $room->image_path) }}" class="img-fluid mb-3" alt="Room Image" style="max-height: 200px; object-fit: cover;">
                    @else
                        <img src="https://via.placeholder.com/300x200" class="img-fluid mb-3" alt="Room Image" style="max-height: 200px; object-fit: cover;">
                    @endif

                    <p class="m-0"><strong>Beds:</strong> {{ $room->beds }}</p>
                    <p class="m-0"><strong>Washrooms:</strong> {{ $room->washrooms }}</p>
                    <p class="m-0"><strong>Guests:</strong> {{ $room->guests }}</p>
                    <p class="m-0"><strong>Price:</strong> ${{ number_format($room->price, 2) }}</p>

                    <p class="m-0"><strong>Amenities:</strong></p>
                    <ul>
                        @foreach(json_decode($room->amenities) as $amenity)
                            <li>{{ $amenity }}</li>
                        @endforeach
                    </ul>

                    <form action="{{ route('rooms.book', $room->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="start_date">Start Date</label>
                    <input type="date" name="start_date" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="end_date">End Date</label>
                    <input type="date" name="end_date" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="guests">Guests</label>
                    <input type="number" name="guests" class="form-control" required min="1">
                </div>

                <button type="submit" class="btn btn-primary">Book Now</button>
            </form>
                </div>
            </div>

            <!-- Booking Form -->
            

        </div>
    </div>
</div>
@endsection
