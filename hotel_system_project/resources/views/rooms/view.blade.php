@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h2 class="mb-4" style="color: #9a616d;">Available Rooms for Booking</h2>

            @if($rooms->isEmpty())
                <div class="alert alert-info">No rooms available for booking at the moment.</div>
            @else
                <div class="row">
                    @foreach($rooms as $room)
                        <div class="col-md-4 mb-4 p-0">
                            <div class="card" style="border-color: #9a616d;">
                                <div class="card-header">
                                    {{ $room->address }}
                                </div>
                                <div class="card-body" style="background-color: #f4f1f3;">
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

                                    <a href="{{ route('rooms.book', $room->id) }}" class="btn" style="background-color: #9a616d; color: white;">Book Now</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
