@extends('layouts.app')

@section('title', 'Register - Hostel in Islamabad')

@section('content')
<!-- Centered and resized logo image -->
<div class="logo-container">
    <img src="{{ asset('img/logo.png') }}" alt="Hostel in Islamabad" class="login-logo">
 </div>
 
<section class="register-section">
    <div class="form-container">
        <h1>Create a New Account</h1>
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" name="name" id="name" placeholder="Enter your full name" required>
            </div>
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" name="email" id="email" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Enter your password" required>
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm your password" required>
            </div>
            <button type="submit" class="register-btn">Register</button>
        </form>
        <p class="login-prompt">Already have an account? <a href="{{ route('login') }}">Login</a></p>
    </div>
</section>
@endsection
