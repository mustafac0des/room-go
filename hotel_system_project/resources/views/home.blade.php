@extends('layouts.app')

@if (auth()->check() && auth()->user()->role === 'admin')
    <script type="text/javascript">
        alert("Redirecting to Admin Portal")
        window.location.href = "{{ url('admin/dashboard') }}";
    </script>
@endif

@section('content')
    <div class="container p-0">
        <div class="col col-xl-10 rounded-6">
            <div class="card rounded-4">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="https://images.unsplash.com/photo-1587573088697-b4fa10460683?q=80&w=1965&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                             alt="signup form" class="rounded-4 shadow-lg" style="width: 100%; height: 100%; object-fit: cover;" />
                    </div>
                    <div class="col-md-8 d-flex">
                        <div class="card-body p-0">
                            <div class="card-header fs-3" style="color: #9A616D;">{{ __('Notifications') }}</div>
                            @if (session('status'))
                                <div class="alert alert-success m-2" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            
                            <div class="card-header" style="color: #9A616D;">{{ __('Your Reservations') }}</div>
                            @if ($reservations->isEmpty())
                                <p class="m-2 text-center badge bg-danger text-light">No reservations found!</p>
                            @else
                                <div class="card-body">
                                    @foreach ($reservations as $reservation)
                                        <div class="d-flex align-items-center">
                                            
                                            
                                        </div>
                                        <ul class="d-flex gap-2">
                                            <div>
                                                <img src="{{ asset('storage/' . $reservation->room->image) }}" class="rounded-1 shadow-lg" style="width: 50px; height: 40px; object-fit: cover;" />
                                            </div>
                                            <div>
                                                <i style="color: #9A616D;">{{ $reservation->room->address }}</i>
                                                <i>ID#{{ $reservation->room->id }}</i>
                                                <span class="badge bg-dark"> {{ \Carbon\Carbon::parse($reservation->start_date)->format('d M Y') }} to 
                                                {{ \Carbon\Carbon::parse($reservation->end_date)->format('d M Y') }}</span>
                                                <span class="badge bg-warning text-dark">${{ $reservation->price }}</span>
                                                <span class="badge bg-info text-dark">{{ $reservation->status }}</span>
                                                <br>
                                            </div>
                                        </ul>
                                    @endforeach
                                </div>
                            @endif
                                <div class="card-header" style="color: #9A616D;">{{ __('Your Rooms') }}</div>
                            <div class="card-body">

                            @foreach ($rooms as $room)
                                <div class="d-flex align-items-center">
                                    <div style="margin-left: 20px;">
                                        <img src="{{ asset('storage/' . $room->image) }}" class="rounded-1 shadow-lg" style="width: 50px; height: 40px; object-fit: cover;" />
                                    </div>
                                    <i class="fs-1 m-2" style="color: #9A616D;">{{ $room->address }}</i>
                                    <i>ID#{{$room->id}}</i>
                                </div>
                                <ul>
                                    @foreach ($room->bookings as $booking)
                                        @if ($booking->status == 'occupied')
                                            <div>
                                                <img src="{{ asset('storage/' . $room->image) }}" class="rounded-circle shadow-lg mb-1" style="width: 30px; height: 30px; object-fit: cover;" />
                                                <strong class="fs-sm" style="color: #9A616D;">{{ $booking->guest_name }} / {{ $booking->guest_phone }}</strong> - 
                                                <span class="badge bg-dark"> {{ \Carbon\Carbon::parse($booking->start_date)->format('d M Y') }} to 
                                                {{ \Carbon\Carbon::parse($booking->end_date)->format('d M Y') }}</span>
                                                <span class="badge bg-warning text-dark">${{ $booking->price }}</span>
                                                <span class="badge bg-danger">{{ $room->status }}</span>   
                                                <br>      
                                                <form action="{{ route('rooms.updateBookingStatus', $booking->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" name="status" value="completed" class="btn btn-sm btn-success">Mark As Complete</button>                       
                                                </form>                      
                                            </div>
                                        @elseif ($booking->status == 'pending')
                                            <div>
                                                <img src="{{ asset('storage/' . $room->image) }}" class="rounded-circle shadow-lg mb-1" style="width: 30px; height: 30px; object-fit: cover;" />
                                                <strong class="fs-sm" style="color: #9A616D;">{{ $booking->guest_name }} / {{ $booking->guest_phone }}</strong> - 
                                                <span class="badge bg-dark"> {{ \Carbon\Carbon::parse($booking->start_date)->format('d M Y') }} to 
                                                {{ \Carbon\Carbon::parse($booking->end_date)->format('d M Y') }}</span>
                                                <span class="badge bg-warning text-dark">${{ $booking->price }}</span>
                                                <span class="badge bg-danger">{{ $booking->status }}</span>
                                                <br>
                                                <form action="{{ route('rooms.updateBookingStatus', $booking->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="pt-1 mb-4 btn-group shadow-sm">
                                                        <button type="submit" name="status" value="occupied" class="btn text-light btn-sm" style="background-color: #9A616D;">Accept</button>
                                                        <button type="submit" name="status" value="rejected" class="btn text-light bg-danger btn-sm">Reject</button>
                                                    </div>
                                                </form>
                                            </div>
                                        @elseif ($booking->status == 'rejected')
                                            @continue
                                        @else
                                            <p class="px-3" style="color: #9A616D;">No pending bookings for this room.</p>
                                        @endif
                                    @endforeach
                                </ul>
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
