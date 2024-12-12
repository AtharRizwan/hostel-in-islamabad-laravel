@extends('layouts.app')

@section('title', 'Services - Hostel in Islamabad')

@include('partials.header')

@section('content')
<section class="services-intro">
    <h1 class="color-change">Our Services</h1>
    <p>Explore the amazing services we offer to enhance your stay!</p>
</section>

<section class="services-grid">
    <h2>Available Services</h2>
    <div class="grid-container">
        @foreach ($services as $service)
            <a href="{{ route('service.show', $service->id) }}" class="service-item">
            <img src="{{ asset($service->image_link) }}" alt="{{ $service->name }}">
            <h3>{{ $service->name }} @ 8 PM</h3>
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
                <li class="{{ $review->position }}">
                    <div class="thumb"><img src="https://assets.codepen.io/39255/internal/avatars/users/default.png?height=120&width=120"></div>
                    <div class="description">
                        <h3>{{ $review->name }}</h3>
                        <p>{{ $review->text }}<br><a href="{{ $review->website }}">@ {{ $review->username }}</a></p>
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
    <form action="#">
        <div class="form-row">
            <div class="input-data">
                <input id="first_name" type="text" required>
                <div class="underline"></div>
                <label for=""> First Name</label>
            </div>
            <div class="input-data">
                <input id="last_name" type="text" required>
                <div class="underline"></div>
                <label for=""> Last Name</label>
            </div>
        </div>
        <div class="form-row">
            <div class="input-data">
                <input id="username" type="text" required>
                <div class="underline"></div>
                <label for=""> Username</label>
            </div>
            <div class="input-data">
                <input id="url" type="text" required>
                <div class="underline"></div>
                <label for=""> Website URL</label>
            </div>
        </div>
        <div class="form-row">
            <div class="input-data textarea">
                <textarea rows="8" cols="80" required></textarea>
                <br />
                <div class="underline"></div>
                <label for=""> Write your Review</label>
                <br />
                <div class="form-row">
                    <div id="warning" class="alert">
                    </div>
                </div>
                <div class="form-row submit-btn">
                    <div class="input-data">
                        <div class="inner"></div>
                        <input id="addReviewButton" type="button" value="Add Review">
                    </div>
                    <div class="input-data">
                        <div class="inner"></div>
                        <input id="removeReviewButton" type="button" value="Remove Review">
                    </div>
                </div>
            </div>
    </form>
</div>
@endsection
