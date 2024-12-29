@extends('layouts.app')

@section('content')
    <div class="container p-0">
        <div class="col col-xl-10 rounded-6 w-100">
            <div class="card rounded-4">
                <div class="row g-0">
                    <div class="col-md-6 col-lg-5">
                        <img src="https://plus.unsplash.com/premium_photo-1661964071015-d97428970584?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8aG90ZWx8ZW58MHx8MHx8fDA%3D"
                            alt="login form" class="rounded-4 shadow-lg" style="width: 100%; height: 100%; object-fit: cover;" />
                    </div>
                    <div class="col-md-6 col-lg-7 d-flex align-items-center">
                        <div class="card-body p-4 p-lg-5 text-black">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="d-flex align-items-center mb-3">
                                    <span class="h1 fw-bold mb-0">Sign In to Room<i style="color: #9A616D;">GO</i></span>
                                </div>
                                <div class="form-outline mb-4">
                                    <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" style="color: #9A616D; border: 1px solid #9A616D;" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus />
                                    <label class="form-label mt-2 mx-2" style="color: #9A616D;" for="email">Email address</label>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-outline mb-4">
                                    <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" style="color: #9A616D; border: 1px solid #9A616D;" name="password" required autocomplete="current-password" />
                                    <label class="form-label mt-2 mx-2" style="color: #9A616D;" for="password">Password</label>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="pt-1 mb-4">
                                    <button type="submit" class="btn text-light btn-lg rounded-4 shadow-sm" style="background-color: #9A616D;">Login</button>
                                </div>
                                <p class="mb-5 pb-lg-2 text-dark">Don't have an account? <a href="{{ route('register') }}" style="color: #9A616D;">Register here</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
