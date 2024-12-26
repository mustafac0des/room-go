@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm rounded-3">
                <div class="card-header text-center" style="background-color: #F9F9F9; color: #9A616D;">
                    <h4>{{ __('Your Rooms') }}</h4>
                </div>

                <div class="card-body">
                    @if ($rooms->isEmpty())
                        <p class="text-center text-muted">No rooms found.</p>
                    @else
                        <div class="row">
                            @foreach ($rooms as $room)
                                <div class="col-md-4 mb-4">
                                    <div class="card shadow-sm rounded-3" style="border: 1px solid #9A616D;">
                                        <div class="card-header" style="background-color: #9A616D; color: white;">
                                            Room #{{ $room->id }}
                                        </div>
                                        <div class="card-body">
                                            @if($room->image)
                                                <img src="{{ asset('storage/images/' . $room->image) }}" class="img-fluid mb-3" alt="Room Image">
                                            @else
                                                <img src="https://via.placeholder.com/500" class="img-fluid mb-3" alt="No image available">
                                            @endif
                                            <p class="my-0"><strong>Address:</strong> {{ $room->address }}</p>
                                            <p class="my-0"><strong>Beds:</strong> {{ $room->beds }}</p>
                                            <p class="my-0"><strong>Guests:</strong> {{ $room->guests }}</p>
                                            <p class="my-0"><strong>Price:</strong> ${{ $room->price }}</p>
                                            
                                            @if ($room->bookings->where('status', '!=', 'occupied')->isEmpty())
                                                <form action="{{ route('rooms.delete', $room->id) }}" method="POST" class="d-inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="mt-2 btn btn-danger btn-sm rounded-2">
                                                        Delete
                                                    </button>
                                                </form>
                                            @endif
                                            
                                            <a href="{{ route('rooms.edit', $room->id) }}" class="btn btn-primary btn-sm rounded-2 mt-2" style="background-color: #9A616D; border-color: #9A616D;">
                                                Edit
                                            </a>
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
