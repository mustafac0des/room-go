@extends('layouts.app')
@section('content')
    <div class="container p-0">
        <div class="col col-xl-10 rounded-6 w-100">
            <div class="card rounded-4">
                <div class="row g-0">
                    <div class="col-md-6 col-lg-5">
                        <img src="https://images.unsplash.com/photo-1547961547-321889bff29e?q=80&w=2080&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                             alt="signup form" class="rounded-4 shadow-lg" style="width: 100%; height: 100%; object-fit: cover;" />
                    </div>
                    <div class="col-md-6 col-lg-7 d-flex align-items-center">
                        <div class="card-body p-4 p-lg-5 text-black">
                            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="d-flex align-items-center pb-0 mb-3">
                                    <span class="h1 fw-bold mb-0">Sign Up for Room<i style="color: #9A616D;">GO</i></span>
                                </div>
                                @foreach (['name', 'picture', 'gender', 'address', 'phone', 'email', 'password', 'password_confirmation'] as $field)
                                    <div class="form-outline mb-1">
                                        @if ($field === 'gender')
                                            <select id="gender" class="form-control form-control-md @error('gender') is-invalid @enderror" style="color: #9A616D; border: 1px solid #9A616D;" name="gender" required>
                                                <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                                <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                                            </select>
                                        @elseif ($field === 'picture')
                                            <input type="file" id="picture" class="form-control form-control-md @error('picture') is-invalid @enderror" style="color: #9A616D; border: 1px solid #9A616D;" name="picture" accept="image/*" />
                                        @elseif (in_array($field, ['password', 'password_confirmation']))
                                            <input type="password" id="{{ $field }}" class="form-control form-control-md @error($field) is-invalid @enderror" style="color: #9A616D; border: 1px solid #9A616D;" name="{{ $field }}" required autocomplete="new-password" />
                                            <i id="toggle{{ ucfirst($field) }}" class="bi bi-eye position-absolute top-50 end-0 translate-middle-y me-1" style="color: #9A616D; border: 1px solid #9A616D; cursor: pointer;"></i>
                                        @else
                                            <input type="{{ $field === 'email' ? 'email' : 'text' }}" id="{{ $field }}" class="form-control form-control-md @error($field) is-invalid @enderror" style="color: #9A616D; border: 1px solid #9A616D;" name="{{ $field }}" value="{{ old($field) }}" required autocomplete="{{ $field }}" autofocus />
                                        @endif
                                        <label class="form-label mt-2 mx-2" style="color: #9A616D;" for="{{ $field }}">
                                            {{ ucfirst(str_replace('_', ' ', $field)) }}
                                        </label>
                                        @error($field)
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                @endforeach
                                <div class="pt-1 mb-4">
                                    <button type="submit" class="btn text-light btn-lg rounded-4 shadow-sm" style="background-color: #9A616D;">Register</button>
                                </div>
                                <p class="mb-5 pb-lg-1 text-dark">Already have an account? <a href="{{ route('login') }}" style="color: #9A616D;">Sign In</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
