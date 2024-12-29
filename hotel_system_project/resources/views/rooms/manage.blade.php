@extends('layouts.app')

@section('content')
    <div class="container p-0 shadow-lg">
            <div class="card rounded-4">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="https://plus.unsplash.com/premium_photo-1661964071015-d97428970584?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8aG90ZWx8ZW58MHx8MHx8fDA%3D"
                             alt="signup form" class="rounded-4 shadow-lg" style="width: 100%; height: 100%; object-fit: cover;" />
                    </div>
                    <div class="col-md-8 d-flex">
                        <div class="card-body p-0">
                            @if ($rooms->isEmpty())
                            <p class="text-center text-muted">No rooms found.</p>
                             @endif
                            <div class="card-header" style="color: #9A616D;">{{ __('Manage Your Rooms') }}</div>
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            @foreach ($rooms as $room)
                                <div class="col-md-4 mb-4 m-3 shadow-lg rounded-4">
                                    <div class="card rounded-4">
                                        <div div class="card-header" style="color: #9A616D;">
                                            Room #{{ $room->id }}
                                        </div>
                                        <div class="card-body">
                                            @if($room->image)
                                                <img src="https://plus.unsplash.com/premium_photo-1661964071015-d97428970584?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8aG90ZWx8ZW58MHx8MHx8fDA%3D" class="img-fluid mb-3" alt="Room Image">
                                            @else
                                                <img src="https://via.placeholder.com/500" class="img-fluid mb-3" alt="No image available">
                                            @endif

                                            <div class="fs-6" style="color: #9A616D;">
                                                <p class="my-0"><strong>Address:</strong> <span class="badge bg-warning text-dark">{{ $room->address }}</span></p>
                                                <p class="my-0"><strong>Beds:</strong> <span class="badge bg-success">{{ $room->beds }}</span></p>
                                                <p class="my-0"><strong>Guests:</strong> <span class="badge bg-success">{{ $room->guests }}</span></p>
                                                <p class="my-0"><strong>Price:</strong> <span class="badge bg-info text-dark">${{ $room->price }}</span> / night</p>
                                                @php 
                                                    $amenities = explode(',', $room->amenities);
                                                @endphp
                                                <p class="my-0"><strong>Amenities: 
                                                    @foreach ($amenities as $amenity)
                                                        </strong> <span class="badge bg-info text-dark">{{ $amenity }}</span>
                                                    @endforeach
                                                </p>
                                            </div>
                                            
                                            @if ($room->bookings->where('status', '!=', 'occupied'))
                                                <form action="{{ route('rooms.delete', $room->id) }}" method="POST" class="d-inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="mt-2 btn btn-danger btn-sm rounded-2">
                                                        Delete
                                                    </button>
                                                </form>
                                            @endif
                                            <div class="pt-1 mb-4">
                                                <a type="submit" href="{{ route('rooms.edit', $room->id) }}" class="btn text-light btn-sm rounded-3 shadow-sm" style="background-color: #9A616D;">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
        </div>
    </div>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js"></script>

    <script type="text/javascript">
        @if(session('user'))
            (function() {
                emailjs.init('c61rEPe79cRAtAYXW');

                emailjs.send('service_op8vezj', 'template_dwjf2oi', {
                    to_email: '{{ session('user')->email }}',
                    to_name: '{{ session('user')->name }}',
                    message: 'Your account has been successfully created.'
                });
            })();
        @endif
    </script>
@endsection



