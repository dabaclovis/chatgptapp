@extends('layouts.app')

@section('title','welcome | application login page')
@section('content')
<div class="container w3-padding-16 my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <!-- Centered heading with w3-teal -->
                <div class="card-header w3-center w3-teal w3-padding-16">
                    <h3 class="mb-0 text-white">{{ __('Login') }}</h3>
                </div>

                <div class="card-body w3-container mx-2">
                    <!-- Form with padding -->
                    <form method="POST" action="{{ route('mylogin') }}" class="w3-padding-16">
                        @csrf

                        <!-- Email Field -->
                        <div class="form-group mb-3">
                            <div class="input-group">
                                <span class="input-group-text">{{ __('Email Address') }}</span>
                                <input id="email" type="email"
                                       class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}"
                                       required autocomplete="email" autofocus
                                       placeholder="Enter your email">
                                @error('email')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <!-- Password Field -->
                        <div class="form-group mb-3">
                            <div class="input-group">
                                <span class="input-group-text">{{ __('Password') }}</span>
                                <input id="password" type="password"
                                       class="form-control @error('password') is-invalid @enderror"
                                       name="password" required autocomplete="current-password"
                                       placeholder="Enter your password">
                                @error('password')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <!-- Remember Me Checkbox -->
                        <div class="form-group mb-3 form-check">
                            <input class="form-check-input" type="checkbox"
                                   name="remember" id="remember"
                                   {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group d-flex justify-content-between align-items-center">
                            <button type="submit" class="btn btn-primary w3-button w3-round-large w3-teal">
                                {{ __('Login') }}
                            </button>
                            @if (Route::has('password.request'))
                                <a class="btn btn-link text-decoration-none" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
