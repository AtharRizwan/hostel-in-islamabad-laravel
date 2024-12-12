@extends('layouts.app')

@section('title', 'Login - Hostel in Islamabad')

@section('content')
<!-- Centered and resized logo image -->
 <div class="logo-container">
    <img src="{{ asset('img/logo.png') }}" alt="Hostel in Islamabad" class="login-logo">
 </div>

<section class="login-section">
    <div class="form-container">
        <h1>Login to Your Account</h1>

        <!-- Display validation errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" name="email" id="email" placeholder="Enter your email"  required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Enter your password" required>
            </div>
            <div class="form-options">
                <div>
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember">Remember Me</label>
                </div>
                <a href="{{ route('password.request') }}" class="forgot-password">Forgot Password?</a>
            </div>
            <button type="submit" class="login-btn">Login</button>
        </form>
        <p class="signup-prompt">Don't have an account? <a href="{{ route('register') }}">Sign Up</a></p>
    </div>
</section>

@endsection
