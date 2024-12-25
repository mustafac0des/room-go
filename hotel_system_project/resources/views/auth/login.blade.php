@extends('layouts.app')

@section('content')
<section class="vh-120">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                <div class="card" style="border-radius: 1rem;">
                    <div class="row g-0">
                        <div class="col-md-6 col-lg-5 d-flex align-items-stretch">
                            <img src="https://plus.unsplash.com/premium_photo-1661964071015-d97428970584?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8aG90ZWx8ZW58MHx8MHx8fDA%3D"
                                alt="login form" class="img-fluid" style="width: 100%; height: 100%; object-fit: cover; border-radius: 1rem 0 0 1rem;" />
                        </div>
                        <div class="col-md-6 col-lg-7 d-flex align-items-center">
                            <div class="card-body p-4 p-lg-5 text-black">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    
                                    <div class="d-flex align-items-center mb-3 pb-1">
                                        <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                        <span class="h1 fw-bold mb-0">Sign In to RoomGO</span>
                                    </div>

                                    <h4 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign In</h4>

                                    <div class="form-outline mb-4">
                                        <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus />
                                        <label class="form-label" for="email">Email address</label>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!-- Password Input -->
                                    <div class="form-outline mb-4">
                                        <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" />
                                        <label class="form-label" for="password">Password</label>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!-- Remember Me Checkbox -->
                                    <div class="pt-1 mb-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} />
                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="pt-1 mb-4">
                                        <button type="submit" class="btn btn-dark btn-lg btn-block">Login</button>
                                    </div>

                                    <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="{{ route('register') }}" style="color: #393f81;">Register here</a></p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
