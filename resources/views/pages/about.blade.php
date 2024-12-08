@extends('layouts.app')

@section('title', 'About - Hostel in Islamabad')

@section('content')
<section class="about-intro">
    <h1 class="color-change">About Us</h1>
    <p>Who we are and what we do</p>
</section>

<div class="about-info">
    <div class="about-info-image">
        <img src="{{ asset('img/hostel.jpg') }}" alt="hostel image">
    </div>

    <div class="about-info-content">
        <h2 class="color-change">Our Mission</h2>
        <p class="about-details">Located in the heart of Islamabad, we have been providing the best hostel facilities for students and travelers alike. Our aim is to make your stay in Islamabad the most memorable one of your life. Our customer support team is active 24/7 to provide you with the best service and to solve any of your unforeseen problems during your stay or somehow related to it.</p>
        <button id="toggleDetailsBtn" onclick="toggleDetails()">Show Details</button>
    </div>
</div>

<!-- Contact Form Section -->
<div class="contact-section">
    <h2 class="color-change">Contact Us</h2>
    <form action="#" id="contact-form" method="POST" class="contact-form">
        <label for="name">Your Name</label>
        <input type="text" id="name" name="name">

        <label for="email">Your Email</label>
        <input type="email" id="email" name="email" required>

        <label for="phone">Your Phone no.</label>
        <input type="text" id="phone" name="phone" required>

        <label for="message">Your Message</label>
        <textarea id="message" name="message" rows="5" required></textarea>

        <button type="submit" class="submit-button">Send Message</button>
    </form>
</div>
@endsection