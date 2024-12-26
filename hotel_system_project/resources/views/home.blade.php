@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
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
