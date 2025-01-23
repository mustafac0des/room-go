@extends('layouts.app')

@section('content')
    <div class="container p-0">
        <div class="col col-xl-10 rounded-6 w-100">
            <div class="card rounded-4">
                <div class="row g-0">
                    <div class="col-md-6 col-lg-5">
                        <img src="https://images.unsplash.com/photo-1532490389938-2856e3f1560a?q=80&w=2080&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                             alt="Profile Management" class="rounded-4 shadow-lg" style="width: 100%; height: 100%; object-fit: cover;" />
                    </div>
                    <div class="col-md-6 col-lg-7 d-flex align-items-center">
                        <div class="card-body p-4 p-lg-5 text-black">
                            <form method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="d-flex align-items-center pb-0 mb-3">
                                    <span class="h1 fw-bold mb-0">Edit User Profile</span>
                                </div>
                                <div class="form-outline mb-1">
                                    <input type="text" id="name" class="form-control form-control-md @error('name') is-invalid @enderror" style="color: #9A616D; border: 1px solid #9A616D;" name="name" value="{{ old('name', $user->name) }}" required autocomplete="name" />
                                    <label class="form-label mt-2 mx-2" style="color: #9A616D;" for="name">Name</label>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-outline mb-1">
                                    <input type="email" id="email" class="form-control form-control-md @error('email') is-invalid @enderror" style="color: #9A616D; border: 1px solid #9A616D;" name="email" value="{{ old('email', $user->email) }}" required />
                                    <label class="form-label mt-2 mx-2" style="color: #9A616D;" for="email">Email</label>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-outline mb-1">
                                    <input type="text" id="address" class="form-control form-control-md @error('address') is-invalid @enderror" style="color: #9A616D; border: 1px solid #9A616D;" name="address" value="{{ old('address', $user->address) }}" required />
                                    <label class="form-label mt-2 mx-2" style="color: #9A616D;" for="address">Address</label>
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-outline mb-1">
                                    <input type="text" id="phone" class="form-control form-control-md @error('phone') is-invalid @enderror" style="color: #9A616D; border: 1px solid #9A616D;" name="phone" value="{{ old('phone', $user->phone) }}" required />
                                    <label class="form-label mt-2 mx-2" style="color: #9A616D;" for="phone">Phone</label>
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-outline mb-1">
                                    <select id="gender" class="form-control form-control-md @error('gender') is-invalid @enderror" style="color: #9A616D; border: 1px solid #9A616D;" name="gender" required>
                                        <option value="male" {{ old('gender', $user->gender) == 'male' ? 'selected' : '' }}>Male</option>
                                        <option value="female" {{ old('gender', $user->gender) == 'female' ? 'selected' : '' }}>Female</option>
                                    </select>
                                    <label class="form-label mt-2 mx-2" style="color: #9A616D;" for="gender">Gender</label>
                                    @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-outline mb-1">
                                    <select id="role" class="form-control form-control-md @error('role') is-invalid @enderror" style="color: #9A616D; border: 1px solid #9A616D;" name="role" required>
                                        <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>User</option>
                                        <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                                    </select>
                                    <label class="form-label mt-2 mx-2" style="color: #9A616D;" for="role">Role</label>
                                    @error('role')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-outline mb-1">
                                    <input type="file" id="picture" class="form-control form-control-md @error('picture') is-invalid @enderror" style="color: #9A616D; border: 1px solid #9A616D;" name="picture" accept="image/*" />
                                    <label class="form-label mt-2 mx-2" style="color: #9A616D;" for="picture">Profile Picture</label>
                                    @error('picture')
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
                                    <button type="submit" class="btn text-light btn-lg rounded-4 shadow-sm" style="background-color: #9A616D;">Update User</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
