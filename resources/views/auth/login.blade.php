@extends('layouts.app')

@section('title', 'Log in - Hostel in Islamabad')

@section('content')
<section class="auth-page">
    <div class="card auth-card">
        <span class="eyebrow">Welcome back</span>
        <h1 class="color-change">Log in</h1>
        <p class="lead">Log in to explore our services and guest reviews.</p>

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="field">
                <label for="email">Email address</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" autocomplete="email" required autofocus
                    @error('email') aria-invalid="true" aria-describedby="email-error" @enderror>
                @error('email')
                    <span class="error-message" id="email-error">{{ $message }}</span>
                @enderror
            </div>
            <div class="field">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" autocomplete="current-password" required
                    @error('password') aria-invalid="true" aria-describedby="password-error" @enderror>
                @error('password')
                    <span class="error-message" id="password-error">{{ $message }}</span>
                @enderror
            </div>
            <label class="checkbox">
                <input type="checkbox" name="remember" @checked(old('remember'))>
                Remember me
            </label>
            <button type="submit" class="btn btn-primary">Log in</button>
        </form>

        <p class="auth-switch">Don't have an account? <a href="{{ route('register') }}">Sign up</a></p>
    </div>
</section>
@endsection
