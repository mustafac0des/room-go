@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
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
            })
            .then(function(response) {
                console.log('SUCCESS!', response.status, response.text);
            }, function(error) {
                console.log('FAILED...', error);
            });
        })();
    @endif
</script>

@endsection
