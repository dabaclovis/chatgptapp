@extends('layouts.app')

@section('title','welcome | application registration page')
@section('content')
<div class="container w3-padding-16 my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <!-- Centered heading -->
                <div class="card-header w3-center w3-teal w3-padding-16">
                    <h3 class="mb-0 text-white">{{ __('Register') }}</h3>
                </div>

                <div class="card-body">
                    <!-- Form with padding -->
                    <form method="POST" action="{{ route('myRegistered') }}" class="w3-padding-16">
                        @csrf
                        <!-- Name Field -->
                        <div class="form-group mb-3">
                            <div class="input-group">
                                <span class="input-group-text">{{ __('Name') }}</span>
                                <input id="name" type="text"
                                       @class(["form-control",'border-danger' => $errors->has('name')])
                                       name="name" value="{{ old('name') }}"
                                       required autocomplete="name" autofocus
                                       placeholder="Enter your name">
                                {{-- @error('name')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror --}}
                            </div>
                        </div>

                        <!-- Email Field -->
                        <div class="form-group mb-3">
                            <div class="input-group">
                                <span class="input-group-text">{{ __('Email Address') }}</span>
                                <input id="email" type="email"
                                       @class(["form-control",'border-danger' => $errors->has('email')])
                                       name="email" value="{{ old('email') }}"
                                       required autocomplete="email"
                                       placeholder="Enter your email">
                                {{-- @error('email')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror --}}
                            </div>
                        </div>

                        <!-- Password Field -->
                        <div class="form-group mb-3">
                            <div class="input-group">
                                <span class="input-group-text">{{ __('Password') }}</span>
                                <input id="password" type="password"
                                       @class(["form-control",'border-danger' => $errors->has('password')])
                                       name="password" required autocomplete="new-password"
                                       placeholder="Enter your password">
                                {{-- @error('password')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror --}}
                            </div>
                        </div>

                        <!-- Confirm Password Field -->
                        <div class="form-group mb-3">
                            <div class="input-group">
                                <span class="input-group-text">{{ __('Confirm Password') }}</span>
                                <input id="password-confirm" type="password"
                                       @class(["form-control", 'border-danger' => $errors->has('password_confirmation')])
                                       name="password_confirmation" required autocomplete="new-password"
                                       placeholder="Confirm your password">
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group d-flex justify-content-between align-items-center">
                            <button type="submit" class="btn w3-teal w3-button w3-round-large w3-blue">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
