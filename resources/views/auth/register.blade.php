@extends('layouts.app')

@section('title', 'Register - Hostel in Islamabad')

@section('content')
<section class="auth-page">
    <div class="card auth-card">
        <span class="eyebrow">Join us</span>
        <h1 class="color-change">Create an account</h1>
        <p class="lead">Sign up to browse our services and share your own review.</p>

        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="field">
                <label for="name">Full name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" autocomplete="name" required autofocus
                    @error('name') aria-invalid="true" aria-describedby="name-error" @enderror>
                @error('name')
                    <span class="error-message" id="name-error">{{ $message }}</span>
                @enderror
            </div>
            <div class="field">
                <label for="email">Email address</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" autocomplete="email" required
                    @error('email') aria-invalid="true" aria-describedby="email-error" @enderror>
                @error('email')
                    <span class="error-message" id="email-error">{{ $message }}</span>
                @enderror
            </div>
            <div class="field">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" autocomplete="new-password" required
                    @error('password') aria-invalid="true" aria-describedby="password-error" @enderror>
                @error('password')
                    <span class="error-message" id="password-error">{{ $message }}</span>
                @enderror
            </div>
            <div class="field">
                <label for="password_confirmation">Confirm password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" autocomplete="new-password" required>
            </div>
            <button type="submit" class="btn btn-primary">Create account</button>
        </form>

        <p class="auth-switch">Already have an account? <a href="{{ route('login') }}">Log in</a></p>
    </div>
</section>
@endsection
