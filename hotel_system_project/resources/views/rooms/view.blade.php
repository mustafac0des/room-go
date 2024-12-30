@extends('layouts.app')

@section('content')
<div class="container p-0 shadow-lg">
    <div class="card rounded-4">
        <div class="row g-0">
            <div class="col-md-4">
                @foreach($rooms as $room)
                    @if($room->image_path) 
                        <img src="{{ asset('storage/' . $room->image_path) }}" class="rounded-4 shadow-lg" alt="Room Image" style="width: 100%; height: 100%; object-fit: cover;" />
                    @else
                        <img src="https://images.unsplash.com/photo-1517820982827-59baae796dee?q=80&w=1992&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="rounded-4 shadow-lg" alt="Room Image" style="width: 100%; height: 100%; object-fit: cover;" />
                    @endif
                @endforeach
            </div>
            <div class="col-md-8">
                <div class="card-body p-0">
                    <div class="card-header" style="color: #9A616D;">{{ __('Available Rooms for Booking') }}</div>

                    @if($rooms->isEmpty())
                        <div class="alert alert-info">No rooms available for booking at the moment.</div>
                    @else
                        <div class="row">
                            @foreach($rooms as $room)
                                <div class="w-auto m-4">
                                    <div class="card shadow-lg rounded-4">
                                        <div class="card-body">
                                            @if($room->image)
                                                <img src="{{ asset('storage/' . $room->image) }}" class="img-fluid mb-3 rounded-4 shadow-lg" alt="Room Image" style="max-height: 200px; object-fit: cover;">
                                            @else
                                                <img src="https://via.placeholder.com/300x200" class="img-fluid mb-3 rounded-4 shadow-lg" alt="Room Image" style="max-height: 200px; object-fit: cover;">
                                            @endif

                                            <div class="fs-6" style="color: #9A616D;">
                                                <p class="my-0"><strong>Address:</strong> <span class="badge bg-danger">{{ $room->address }}</span></p>    
                                                <p class="my-0"><strong>Beds:</strong> <span class="badge bg-success">{{ $room->beds }}</span></p>
                                                <p class="my-0"><strong>Guests:</strong> <span class="badge bg-success">{{ $room->guests }}</span></p>
                                                <p class="my-0"><strong>Price:</strong> <span class="badge bg-info text-dark">${{ number_format($room->price, 2) }}</span> / night</p>
                                                
                                                <p class="my-0"><strong>Amenities:</strong>
                                                    @foreach(json_decode($room->amenities) as $amenity)
                                                        <span class="badge bg-info text-dark">{{ $amenity }}</span>
                                                    @endforeach
                                                </p>
                                            </div>
                                            
                                            <div class="pt-1">
                                                <a href="{{ route('rooms.order', $room->id) }}" class="btn text-light btn-sm rounded-3 shadow-sm" style="background-color: #9A616D;">Book Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
