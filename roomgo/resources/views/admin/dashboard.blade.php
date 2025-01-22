@extends('layouts.app')
@if (auth()->check() && auth()->user()->role === 'user')
    <script type="text/javascript">
        window.location.href = "{{ url('admin.dashboard') }}";
    </script>
@endif

@section('content')
    <div class="container p-0">
        <div class="col col-xl-10 rounded-6">
            <div class="card rounded-4">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="https://images.unsplash.com/photo-1618044619888-009e412ff12a?q=80&w=2071&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                             alt="signup form" class="rounded-4 shadow-lg" style="width: 100%; height: 100%; object-fit: cover;" />
                    </div>
                    <div class="col-md-8 d-flex">
                        <div class="card-body p-0">
                            <div class="card-header fs-3" style="color: #9A616D;">{{ __('ADMIN PORTAL') }}</div>
                            @if (session('status'))
                                <div class="alert alert-success m-2" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <div class="text-center my-4">
                                <h1 class="display-4">{{ __('Welcome to the Admin Portal') }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
