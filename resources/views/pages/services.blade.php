@extends('layouts.app')

@section('title', 'Services - Hostel in Islamabad')

@include('partials.header')

@section('content')
@if (Auth::check() && Auth::user()->role === 'admin'){
<section class="services-intro">
    <h1 class="color-change">Admin Access</h1>
    <p>You are currently logged in as an admin, kindly click a service to edit it</p>
    <p>You can delete any review!</p>
</section>

@else
<section class="services-intro">
    <h1 class="color-change">Our Services</h1>
    <p>Explore the amazing services we offer to enhance your stay!</p>
</section>
@endif

<section class="services-grid">
    <h2>Available Services</h2>
    <div class="grid-container">
        @foreach ($services as $service)
            <a href="{{ route('service.show', $service->id) }}" class="service-item">
            <img src="{{ asset($service->image_link) }}" alt="{{ $service->name }}">
            <h3>{{ $service->name }}</h3>
            <p>{{ $service->description }}</p>
            </a>
        @endforeach
    </div>
</section>

<!-- Pricing Table Section -->
<section class="pricing-section">
    <h2>Our Pricing</h2>
    <table class="pricing-table">
        <thead>
            <tr>
                <th>Service</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($services as $service)
            <tr>
                <td>{{ $service->name }}</td>
                <td>{{ $service->price }} per serving</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</section>
<div class="reviews_title">
    <h2> Customer Reviews </h2>
</div>
<div class="reviews">
    <div class="content">
        <ul class="team">
            @foreach ($reviews as $review)
                <li class="{{ $review->position }}" id="review-{{ $review->id }}">
                    <div class="thumb"><img src="https://assets.codepen.io/39255/internal/avatars/users/default.png?height=120&width=120"></div>
                    <div class="description">
                        <h3>{{ $review->name }}</h3>
                        @if (Auth::check() && (Auth::id() === $review->user_id || Auth::user()->role === 'admin'))
                            <!-- Only show delete button for the review owner -->
                            <form action="{{ route('reviews.delete', $review->id) }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        @endif
                        <p contenteditable="false">{{ $review->text }}<br><a href="{{ $review->website }}">@ {{ $review->username }}</a></p>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
<div class="reviews_title">
    <h2>Add Review</h2>
</div>
<div class="container">
    <form action="{{ url('/services') }}" method='POST'>
        @csrf
        <div class="form-row">
            <div class="input-data">
                <input id="url" type="text" name="url" value="{{ old('url') }}" required>
                <div class="underline"></div>
                <label for=""> Portfolio URL</label>
            </div>
        </div>
        <div class="form-row">
            <div class="input-data textarea">
                <textarea rows="8" cols="80" name="review" value="{{ old('review') }}" required></textarea>
                <br />
                <div class="underline"></div>
                <label for=""> Write your Review</label>
                <br />
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="form-row submit-btn">
                    <div class="input-data">
                        <div class="inner"></div>
                        <input id="addReviewButton" type="submit" value="Add Review">
                    </div>
                </div>
            </div>
    </form>
</div>
@endsection
