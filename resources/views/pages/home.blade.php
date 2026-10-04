@extends('layouts.app')

@section('title', 'Hostel in Islamabad')

@push('styles')
    @vite('resources/css/home.css')
@endpush

@section('content')
<section class="hero">
    <div class="container hero-content">
        <span class="eyebrow">Cozy hostel in Islamabad</span>
        <h1 class="fade-in color-change">Welcome to Hostel in Islamabad</h1>
        <p class="lead">Experience fun, relaxation, and adventure at our cozy hostel!</p>
        <div class="hero-actions">
            <a href="{{ route('services') }}" class="btn btn-primary">Explore services</a>
            <a href="{{ route('about') }}#contact" class="btn btn-ghost">Contact us</a>
        </div>
        <ul class="hero-facts">
            <li>24/7 support</li>
            <li>Free pick-up &amp; drop-off</li>
            <li>Breakfast 7&ndash;9 AM</li>
        </ul>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section-header">
            <span class="eyebrow">What we offer</span>
            <h2 class="color-change">Our Unique Features</h2>
            <p class="lead">Little extras that make your stay feel like home.</p>
        </div>
        <div class="grid">
            @foreach ($featured as $service)
                <a href="{{ route('service.show', $service) }}" class="card card-link">
                    <div class="card-media">
                        <img src="{{ asset($service->image_link) }}" alt="" loading="lazy">
                    </div>
                    <div class="card-body">
                        <h3>{{ $service->name }}</h3>
                        <p>{{ $service->description }}</p>
                        <span class="card-more">Learn more &rarr;</span>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>

<section class="section section-alt">
    <div class="container">
        <div class="section-header center">
            <span class="eyebrow">Testimonials</span>
            <h2 class="color-change">What Our Guests Say</h2>
        </div>
        <div class="quote-grid">
            <figure class="card quote-card">
                <blockquote>
                    <p>… well it certainly wasn’t what I expected, but that’s not a bad thing. The hostel area itself is quite a welcoming area …</p>
                </blockquote>
                <figcaption>Hostel guest</figcaption>
            </figure>
            <figure class="card quote-card">
                <blockquote>
                    <p>As a business owner, I’m constantly looking for new experiences … the facilities offered by the hostel were extraordinary!</p>
                </blockquote>
                <figcaption>Business owner</figcaption>
            </figure>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="cta-band">
            <div>
                <h2 class="color-change">Ready to stay with us?</h2>
                <p>Questions about rooms, prices or pick-up? Our team replies 24/7.</p>
            </div>
            <a href="{{ route('about') }}#contact" class="btn btn-light">Get in touch</a>
        </div>
    </div>
</section>
@endsection
