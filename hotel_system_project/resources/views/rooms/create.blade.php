@extends('layouts.app')

@section('content')
<div class="container mt-5 rounded-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header" style="background-color: #F9F9F9;">
                    <h4 class="fs-3">{{ __('Host A Room') }}</h4>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('rooms.store') }}">
                        @csrf

                        <!-- Beds -->
                        <div class="form-group mb-4 row">
                            <label for="beds" class="col-md-4 col-form-label text-md-right text-muted">{{ __('Beds') }}</label>
                            <div class="col-md-6">
                                <select id="beds" class="form-control @error('beds') is-invalid @enderror" name="beds" required>
                                    <option value="1" {{ old('beds') == '1' ? 'selected' : '' }}>1</option>
                                    <option value="2" {{ old('beds') == '2' ? 'selected' : '' }}>2</option>
                                    <option value="3" {{ old('beds') == '3' ? 'selected' : '' }}>3</option>
                                </select>
                                @error('beds')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Washrooms -->
                        <div class="form-group mb-4 row">
                            <label for="washrooms" class="col-md-4 col-form-label text-md-right text-muted">{{ __('Washrooms') }}</label>
                            <div class="col-md-6">
                                <select id="washrooms" class="form-control @error('washrooms') is-invalid @enderror" name="washrooms" required>
                                    <option value="1" {{ old('washrooms') == '1' ? 'selected' : '' }}>1</option>
                                    <option value="2" {{ old('washrooms') == '2' ? 'selected' : '' }}>2</option>
                                    <option value="3" {{ old('washrooms') == '3' ? 'selected' : '' }}>3</option>
                                </select>
                                @error('washrooms')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Guests -->
                        <div class="form-group mb-4 row">
                            <label for="guests" class="col-md-4 col-form-label text-md-right text-muted">{{ __('Guests') }}</label>
                            <div class="col-md-6">
                                <input id="guests" type="number" class="form-control @error('guests') is-invalid @enderror" name="guests" value="{{ old('guests') }}" required>
                                @error('guests')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Address -->
                        <div class="form-group mb-4 row">
                            <label for="address" class="col-md-4 col-form-label text-md-right text-muted">{{ __('Address') }}</label>
                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required>
                                @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Price -->
                        <div class="form-group mb-4 row">
                            <label for="price" class="col-md-4 col-form-label text-md-right text-muted">{{ __('Price') }}</label>
                            <div class="col-md-6">
                                <input id="price" type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required>
                                @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Amenities -->
                        <div class="form-group mb-4 row">
                            <label for="amenities" class="col-md-4 col-form-label text-md-right text-muted">{{ __('Amenities') }}</label>
                            <div class="col-md-6">
                                @foreach (['Wi-Fi', 'Parking', 'Pool', 'Gym', 'Breakfast', 'Air Conditioning'] as $amenity)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="amenities[]" value="{{ $amenity }}" {{ in_array($amenity, old('amenities', [])) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="{{ $amenity }}">{{ $amenity }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group mb-0 row">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" style="background-color: #9A616D; border-color: #9A616D;">
                                    {{ __('Add Room') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
