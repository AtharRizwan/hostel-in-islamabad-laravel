@extends('layouts.app')

@section('title', 'Home - Hostel in Islamabad')

@include('partials.header')

@section('content')
<section class="hero">
    <h1 class="fade-in color-change">Welcome to Hostel in Islamabad</h1>
    <p>Experience fun, relaxation, and adventure at our cozy hostel! </p>
</section>
<section class="highlights">
    <h2>What Our Guests Say</h2>
    <div class="flex">
        <article>
            <p>“… well it certainly wasn’t what I expected, but that’s not a bad thing. The hostel area itself is quite a welcoming area …”</p>
        </article>
        <article>
            <p>“As a business owner, I’m constantly looking for new experiences … the facilities offered by the hostel were extraordinary!”</p>
        </article>
    </div>
</section>
<section class="features">
    <h2>Our Unique Features</h2>
    <div class="flex">
        <div class="feature-item pudding color-change">
            <p>Hot Chocolate Pudding at 8 PM</p>
        </div>
        <div class="feature-item breakfast color-change">
            <p>Freshly Baked Bread & Breakfast</p>
        </div>
        <div class="feature-item bike color-change">
            <p>Bike Hire Available</p>
        </div>
    </div>
</section>
@endsection