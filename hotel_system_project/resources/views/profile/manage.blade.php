@extends('layouts.app')

@section('content')
    <div class="container p-0">
        <div class="col col-xl-10 rounded-6 w-100">
            <div class="card rounded-4">
                <div class="row g-0">
                    <div class="col-md-6 col-lg-5">
                        <img src="https://plus.unsplash.com/premium_photo-1661964071015-d97428970584?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8aG90ZWx8ZW58MHx8MHx8fDA%3D"
                             alt="Profile Management" class="rounded-4 shadow-lg" style="width: 100%; height: 100%; object-fit: cover;" />
                    </div>
                    <div class="col-md-6 col-lg-7 d-flex align-items-center">
                        <div class="card-body p-4 p-lg-5 text-black">
                            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="d-flex align-items-center pb-0 mb-3">
                                    <span class="h1 fw-bold mb-0">Manage Your Profile</span>
                                </div>
                                <div class="form-outline mb-1">
                                    <input type="text" id="name" class="form-control form-control-md @error('name') is-invalid @enderror" style="color: #9A616D; border: 1px solid #9A616D;" name="name" value="{{ old('name', auth()->user()->name) }}" required autocomplete="name" />
                                    <label class="form-label mt-2 mx-2" style="color: #9A616D;" for="name">Name</label>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-outline mb-1">
                                    <input type="text" id="address" class="form-control form-control-md @error('address') is-invalid @enderror" style="color: #9A616D; border: 1px solid #9A616D;" name="address" value="{{ old('address', auth()->user()->address) }}" required autocomplete="address" />
                                    <label class="form-label mt-2 mx-2" style="color: #9A616D;" for="address">Address</label>
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-outline mb-1">
                                    <input type="text" id="phone" class="form-control form-control-md @error('phone') is-invalid @enderror" style="color: #9A616D; border: 1px solid #9A616D;" name="phone" value="{{ old('phone', auth()->user()->phone) }}" required autocomplete="phone" />
                                    <label class="form-label mt-2 mx-2" style="color: #9A616D;" for="phone">Phone</label>
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-outline mb-1">
                                    <select id="gender" class="form-control form-control-md @error('gender') is-invalid @enderror" style="color: #9A616D; border: 1px solid #9A616D;" name="gender" required>
                                        <option value="male" {{ old('gender', auth()->user()->gender) == 'male' ? 'selected' : '' }}>Male</option>
                                        <option value="female" {{ old('gender', auth()->user()->gender) == 'female' ? 'selected' : '' }}>Female</option>
                                    </select>
                                    <label class="form-label mt-2 mx-2" style="color: #9A616D;" for="gender">Gender</label>
                                    @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-outline mb-1">
                                    <input type="password" id="password" class="form-control form-control-md @error('password') is-invalid @enderror" style="color: #9A616D; border: 1px solid #9A616D;" name="password" />
                                    <label class="form-label mt-2 mx-2" style="color: #9A616D;" for="password">Password</label>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-outline mb-1">
                                    <input type="password" id="password-confirm" class="form-control form-control-md" style="color: #9A616D; border: 1px solid #9A616D;" name="password_confirmation" />
                                    <label class="form-label mt-2 mx-2" style="color: #9A616D;" for="password-confirm">Confirm Password</label>
                                </div>
                                <div class="pt-1 mb-4">
                                    <button type="submit" class="btn text-light btn-lg rounded-4 shadow-sm" style="background-color: #9A616D;">Update Profile</button>
                                </div>
                                <p class="mb-5 pb-lg-1 text-dark">Go back to <a href="{{ route('home') }}" style="color: #9A616D;">Home</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
