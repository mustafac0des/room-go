@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
                        <img src="https://plus.unsplash.com/premium_photo-1661964071015-d97428970584?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8aG90ZWx8ZW58MHx8MHx8fDA%3D"
                            alt="login form" class="rounded-4 shadow-lg" style="width: 100%; height: 100%; object-fit: cover;" />
                    </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Your Room Bookings') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach ($rooms as $room)
                        <h3>{{ $room->address }}</h3>

                        @if ($room->bookings->isNotEmpty())
                            <h5>Pending Bookings:</h5>
                            <ul>
                                @foreach ($room->bookings as $booking)
                                    <li>
                                        <strong>{{ $booking->guest_name }}</strong> - 
                                        {{ \Carbon\Carbon::parse($booking->start_date)->format('d M Y') }} to 
                                        {{ \Carbon\Carbon::parse($booking->end_date)->format('d M Y') }} <br>
                                        <span>{{ $booking->price }} USD for {{ $booking->guest_name }}</span>
                                        <br>

                                        <form action="{{ route('rooms.updateBookingStatus', $booking->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            
                                            <button type="submit" name="status" value="approved" class="btn btn-success">Accept</button>
                                            <button type="submit" name="status" value="rejected" class="btn btn-danger">Reject</button>
                                        </form>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p>No pending bookings for this room.</p>
                        @endif
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
