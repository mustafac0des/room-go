@extends('layouts.app')

@section('content')
<section class="vh-120" style="background-color: #9A616D;">
    <div class="container py-1 h-100">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col col-xl-10">
                <div class="card" style="border-radius: 1rem;">
                    <div class="row g-0 h-100">
                        <!-- Image Section -->
                        <div class="col-md-6 col-lg-5 d-flex align-items-stretch">
                            <img src="https://plus.unsplash.com/premium_photo-1661964071015-d97428970584?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8aG90ZWx8ZW58MHx8MHx8fDA%3D"
                                alt="signup form" class="img-fluid" style="width: 100%; height: 100%; object-fit: cover; border-radius: 1rem 0 0 1rem;" />
                        </div>
                        <div class="col-md-6 col-lg-7 d-flex p-4 align-items-center">
                            <div class="card-body p-1 p-lg-1 text-black">

                                <form method="POST" action="{{ route('register') }}">
                                    @csrf

                                    <div class="d-flex align-items-center mb-1 pb-1">
                                        <i class="fas fa-user-plus fa-2x me-1" style="color: #ff6219;"></i>
                                        <span class="h1 fw-bold mb-0">Sign Up for RoomGO</span>
</div>
                                    <!-- Name -->
                                    <div class="form-outline mb-1">
                                        <input type="text" id="name" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus />
                                        <label class="form-label" for="name">Name</label>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <!-- Gender -->
                                    <div class="form-outline mb-1">
                                        <select id="gender" class="form-control form-control-lg @error('gender') is-invalid @enderror" name="gender" required>
                                            <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                            <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                                        </select>
                                        <label class="form-label" for="gender">Gender</label>
                                        @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <!-- Address -->
                                    <div class="form-outline mb-1">
                                        <input type="text" id="address" class="form-control form-control-lg @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" />
                                        <label class="form-label" for="address">Address</label>
                                        @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <!-- Phone -->
                                    <div class="form-outline mb-1">
                                        <input type="text" id="phone" class="form-control form-control-lg @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" />
                                        <label class="form-label" for="phone">Phone</label>
                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <!-- Email Address -->
                                    <div class="form-outline mb-1">
                                        <input type="email" id="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" />
                                        <label class="form-label" for="email">Email Address</label>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <!-- Password -->
                                    <div class="form-outline mb-1">
                                        <input type="password" id="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" />
                                        <label class="form-label" for="password">Password</label>
                                        <i id="togglePassword" class="bi bi-eye position-absolute top-50 end-0 translate-middle-y me-1" style="cursor: pointer;" onclick="togglePassword()"></i>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <!-- Confirm Password -->
                                    <div class="form-outline mb-1">
                                        <input type="password" id="password-confirm" class="form-control form-control-lg" name="password_confirmation" required autocomplete="new-password" />
                                        <label class="form-label" for="password-confirm">Confirm Password</label>
                                        <i id="toggleConfirmPassword" class="bi bi-eye position-absolute top-50 end-0 translate-middle-y me-1" style="cursor: pointer;" onclick="toggleConfirmPassword()"></i>
                                    </div>

                                    <!-- Signup Button -->
                                    <div class="pt-1 mb-1">
                                        <button type="submit" class="btn btn-dark btn-lg btn-block">Register</button>
                                    </div>

                                    <p class="mb-1 pb-lg-1" style="color: #393f81;">Already have an account? <a href="{{ route('login') }}" style="color: #393f81;">Login here</a></p>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

<script>
    function togglePassword() {
        const passwordField = document.getElementById("password");
        const toggleIcon = document.getElementById("togglePassword");
        if (passwordField.type === "password") {
            passwordField.type = "text";
            toggleIcon.classList.remove("bi-eye");
            toggleIcon.classList.add("bi-eye-slash");
        } else {
            passwordField.type = "password";
            toggleIcon.classList.remove("bi-eye-slash");
            toggleIcon.classList.add("bi-eye");
        }
    }

    function toggleConfirmPassword() {
        const confirmPasswordField = document.getElementById("password-confirm");
        const toggleIcon = document.getElementById("toggleConfirmPassword");
        if (confirmPasswordField.type === "password") {
            confirmPasswordField.type = "text";
            toggleIcon.classList.remove("bi-eye");
            toggleIcon.classList.add("bi-eye-slash");
        } else {
            confirmPasswordField.type = "password";
            toggleIcon.classList.remove("bi-eye-slash");
            toggleIcon.classList.add("bi-eye");
        }
    }
</script>
@endsection
