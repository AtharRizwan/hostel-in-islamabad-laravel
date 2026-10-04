@extends('layouts.app')

@section('title', 'About Us - Hostel in Islamabad')
@section('description', 'Learn about Hostel in Islamabad and contact our 24/7 support team.')

@push('styles')
    @vite('resources/css/about.css')
@endpush

@push('scripts')
    <script src="{{ asset('js/about.js') }}"></script>
@endpush

@section('content')
<section class="page-banner">
    <div class="container">
        <span class="eyebrow">About us</span>
        <h1 class="color-change">About Us</h1>
        <p class="lead">Who we are and what we do</p>
    </div>
</section>

<section class="section">
    <div class="container two-col">
        <div class="about-media">
            <img src="{{ asset('img/hostel.jpg') }}" alt="Dorm room with wooden bunk beds and a large window" width="1600" height="1038">
        </div>
        <div class="about-copy">
            <span class="eyebrow">Our story</span>
            <h2 class="color-change">Our Mission</h2>
            <p class="lead">A friendly, affordable home base for students and travellers in the heart of Islamabad.</p>
            <p class="about-details" id="about-details">Located in the heart of Islamabad, we have been providing the best hostel facilities for students and travelers alike. Our aim is to make your stay in Islamabad the most memorable one of your life. Our customer support team is active 24/7 to provide you with the best service and to solve any of your unforeseen problems during your stay or somehow related to it.</p>
            <button type="button" id="toggleDetailsBtn" class="btn btn-outline" onclick="toggleDetails()" aria-expanded="false" aria-controls="about-details">Show Details</button>
            <ul class="highlights">
                <li><strong>24/7</strong><span>Customer support</span></li>
                <li><strong>Central</strong><span>Heart of Islamabad</span></li>
                <li><strong>Everyone</strong><span>Students &amp; travellers</span></li>
            </ul>
        </div>
    </div>
</section>

<section class="section section-alt" id="contact">
    <div class="container">
        <div class="section-header">
            <span class="eyebrow">Get in touch</span>
            <h2 class="color-change">Contact Us</h2>
            <p class="lead">Send us a message and our team will get back to you.</p>
        </div>
        <div class="contact-layout">
            <aside class="card contact-info">
                <h3>Reach us directly</h3>
                <ul>
                    <li><span class="label">Phone</span><a href="tel:+923001234567">+92&nbsp;300&nbsp;1234567</a></li>
                    <li><span class="label">Email</span><a href="mailto:info@hostelinislamabad.com">info@hostelinislamabad.com</a></li>
                    <li><span class="label">Location</span>Islamabad, Pakistan</li>
                    <li><span class="label">Support</span>Available 24/7</li>
                </ul>
            </aside>
            <form action="#" id="contact-form" method="POST" class="card form-card form-grid" novalidate>
                <div class="field">
                    <label for="name">Your Name</label>
                    <input type="text" id="name" name="name" value="{{ auth()->user()->name }}" autocomplete="name" required>
                </div>
                <div class="field">
                    <label for="email">Your Email</label>
                    <input type="email" id="email" name="email" value="{{ auth()->user()->email }}" autocomplete="email" required>
                </div>
                <div class="field field-full">
                    <label for="phone">Your Phone no.</label>
                    <input type="tel" id="phone" name="phone" autocomplete="tel" required>
                </div>
                <div class="field field-full">
                    <label for="message">Your Message</label>
                    <textarea id="message" name="message" rows="5" required></textarea>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Send Message</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
