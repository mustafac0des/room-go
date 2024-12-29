@extends('layouts.app')

@section('content')
    <div class="container p-0">
        <div class="col col-xl-10 rounded-6">
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

                                            <div class="fs-6" style="color: #9A616D;">
                                                <p class="my-0"><strong>Address:</strong> <span class="badge bg-danger">{{ $room->address }}</span></p>
                                                <p class="my-0"><strong>Beds:</strong> <span class="badge bg-danger">{{ $room->beds }}</span></p>
                                                <p class="my-0"><strong>Guests:</strong> <span class="badge bg-danger">{{ $room->guests }}</span></p>
                                                <p class="my-0"><strong>Price:</strong> <span class="badge bg-danger">${{ $room->price }}</span> / night</p>
                                                @foreach ($room->amenities as $amenity)
                                                    <p class="my-0"><strong>Amenities:</strong> <span class="badge bg-danger">${{ $amenity }}</span> / night</p>
                                                @endforeach
                                            </div>
                                            
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
                            <div class="card-header" style="color: #9A616D;">{{ __('Manage Your Rooms') }}</div>
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            @foreach ($rooms as $room)
                                
                                <div class="d-flex align-items-center">
                                    <div style="margin-left: 20px;">
                                        <img src="https://plus.unsplash.com/premium_photo-1661964071015-d97428970584?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8aG90ZWx8ZW58MHx8MHx8fDA%3D"
                                            alt="signup form" class="rounded-1 shadow-lg" style="width: 50px; height: 40px; object-fit: cover;" />
                                    </div>
                                    <i class="fs-1 m-2" style="color: #9A616D;">{{ $room->address }}</i>
                                    <i>ID#{{$room->id}}</i>
                                </div>
                                @if ($room->bookings->isEmpty()) 
                                    <p>No pending bookings for this room.</p>
                                @else
                                    <ul>
                                        @foreach ($room->bookings as $booking)
                                            @if ($booking->status != 'approved')
                                                <li>
                                                    <strong class="fs-sm" style="color: #9A616D;">{{ $booking->guest_name }} / {{ $booking->guest_phone }}</strong> - 
                                                    <span class="badge bg-dark"> {{ \Carbon\Carbon::parse($booking->start_date)->format('d M Y') }} to 
                                                    {{ \Carbon\Carbon::parse($booking->end_date)->format('d M Y') }}</span>
                                                    <span class="badge bg-warning text-dark">${{ $booking->price }}</span>
                                                    <span class="badge bg-danger">{{ $booking->status }}</span>
                                                    @break
                                                    <form action="{{ route('rooms.updateBookingStatus', $booking->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="pt-1 mb-4">
                                                            <button type="submit" name="status" value="approved" class="btn text-light btn-lg rounded-4 shadow-sm" style="background-color: #9A616D;">Accept</button>
                                                        </div>
                                                        <div class="pt-1 mb-4">
                                                            <button type="submit" name="status" value="rejected" class="btn text-light btn-lg rounded-4 shadow-sm" style="background-color: #9A616D;">Rejected</button>
                                                        </div>
                                                        <button type="submit" name="status" value="approved" class="btn btn-success">Accept</button>
                                                        <button type="submit" name="status" value="rejected" class="btn btn-danger">Reject</button>
                                                    </form>
                                                </li>
                                            @elseif ($booking->status == 'approved')
                                                    <strong class="fs-sm" style="color: #9A616D;">{{ $booking->guest_name }} / {{ $booking->guest_phone }}</strong> - 
                                                    <span class="badge bg-dark"> {{ \Carbon\Carbon::parse($booking->start_date)->format('d M Y') }} to 
                                                    {{ \Carbon\Carbon::parse($booking->end_date)->format('d M Y') }}</span>
                                                    <span class="badge bg-warning text-dark">${{ $booking->price }}</span>
                                                    <span class="badge bg-danger">Occupied</span>
                                                    @break
                                            @endif
                                        @endforeach
                                    </ul>
                                @endif
                            @endforeach
                        </div>
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



