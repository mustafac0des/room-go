@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 p-0">
            <div class="card" style="border-color: #9a616d;">
                <div class="card-header" style="color: #9a616d;">{{ __('Edit Room') }}</div>

                <div class="card-body" style="background-color: #f4f1f3;">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert" style="background-color: #9a616d; color: white;">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('rooms.update', $room->id) }}">
                        @csrf
                        @method('PUT')

                        <!-- Address Field -->
                        <div class="form-group row mb-3">
                            <label for="address" class="col-md-4 col-form-label text-md-right" style="color: #9a616d;">{{ __('Address') }}</label>
                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address', $room->address) }}" autocomplete="address" style="border-color: #9a616d;">
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Beds Field -->
                        <div class="form-group row mb-3">
                            <label for="beds" class="col-md-4 col-form-label text-md-right" style="color: #9a616d;">{{ __('Beds') }}</label>
                            <div class="col-md-6">
                                <input id="beds" type="number" class="form-control @error('beds') is-invalid @enderror" name="beds" value="{{ old('beds', $room->beds) }}" autocomplete="beds" style="border-color: #9a616d;">
                                @error('beds')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Washrooms Field -->
                        <div class="form-group row mb-3">
                            <label for="washrooms" class="col-md-4 col-form-label text-md-right" style="color: #9a616d;">{{ __('Washrooms') }}</label>
                            <div class="col-md-6">
                                <input id="washrooms" type="number" class="form-control @error('washrooms') is-invalid @enderror" name="washrooms" value="{{ old('washrooms', $room->washrooms) }}" autocomplete="washrooms" style="border-color: #9a616d;">
                                @error('washrooms')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Guests Field -->
                        <div class="form-group row mb-3">
                            <label for="guests" class="col-md-4 col-form-label text-md-right" style="color: #9a616d;">{{ __('Guests') }}</label>
                            <div class="col-md-6">
                                <input id="guests" type="number" class="form-control @error('guests') is-invalid @enderror" name="guests" value="{{ old('guests', $room->guests) }}" autocomplete="guests" style="border-color: #9a616d;">
                                @error('guests')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Price Field -->
                        <div class="form-group row mb-3">
                            <label for="price" class="col-md-4 col-form-label text-md-right" style="color: #9a616d;">{{ __('Price') }}</label>
                            <div class="col-md-6">
                                <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price', $room->price) }}" autocomplete="price" style="border-color: #9a616d;">
                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Amenities Field (Checkboxes) -->
                        <div class="form-group row mb-3">
                            <label for="amenities" class="col-md-4 col-form-label text-md-right" style="color: #9a616d;">{{ __('Amenities') }}</label>
                            <div class="col-md-6">
                                @php
                                    $amenities = old('amenities', json_decode($room->amenities, true)) ?? [];
                                    $available_amenities = ['Wi-Fi', 'Parking', 'Pool', 'Gym', 'Breakfast', 'Air Conditioning'];
                                @endphp
                                
                                @foreach ($available_amenities as $amenity)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="amenities[]" value="{{ $amenity }}" 
                                        {{ in_array($amenity, $amenities) ? 'checked' : '' }} style="border-color: #9a616d;">
                                        <label class="form-check-label" for="{{ $amenity }}" style="color: #9a616d;">{{ $amenity }}</label>
                                    </div>
                                @endforeach

                                @error('amenities')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn" style="background-color: #9a616d; color: white;">
                                    {{ __('Update Room') }}
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
