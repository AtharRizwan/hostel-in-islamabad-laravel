@extends('layouts.app')

@section('title', 'Our Services - Hostel in Islamabad')
@section('description', 'Services and prices at Hostel in Islamabad: breakfast, hot chocolate pudding, bike hire, free pick-up and fun events.')

@push('styles')
    {{-- Lato is part of the review card look --}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap">
    @vite('resources/css/services.css')
@endpush

@section('content')
<section class="page-banner">
    <div class="container">
        @if (auth()->user()->isAdmin())
            <span class="eyebrow">Admin access</span>
            <h1 class="color-change">Our Services</h1>
            <p class="lead">You're logged in as an admin: open a service to edit it, and you can delete any review.</p>
        @else
            <span class="eyebrow">What we offer</span>
            <h1 class="color-change">Our Services</h1>
            <p class="lead">Explore the amazing services we offer to enhance your stay!</p>
        @endif
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section-header">
            <span class="eyebrow">Services</span>
            <h2 class="color-change">Available Services</h2>
        </div>
        <div class="grid">
            @foreach ($services as $service)
                <a href="{{ route('service.show', $service) }}" class="card card-link">
                    <div class="card-media">
                        <img src="{{ asset($service->image_link) }}" alt="" loading="lazy">
                    </div>
                    <div class="card-body">
                        <span class="chip">{{ $service->price }}</span>
                        <h3>{{ $service->name }}</h3>
                        <p>{{ $service->description }}</p>
                        <span class="card-more">View details &rarr;</span>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>

<section class="section section-alt">
    <div class="container container-narrow">
        <div class="section-header center">
            <span class="eyebrow">Pricing</span>
            <h2 class="color-change">Our Pricing</h2>
            <p class="lead">Simple prices, no hidden extras.</p>
        </div>
        <div class="card">
            <table class="pricing-table">
                <thead>
                    <tr>
                        <th scope="col">Service</th>
                        <th scope="col">Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($services as $service)
                        <tr>
                            <td>{{ $service->name }}</td>
                            <td>{{ $service->price }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

<section class="section" id="reviews">
    <div class="container">
        <div class="section-header center">
            <span class="eyebrow">Testimonials</span>
            <h2 class="color-change">Customer Reviews</h2>
            <p class="lead">What recent guests say about our services.</p>
        </div>
        <div class="reviews">
            <div class="content">
                @if ($reviews->isEmpty())
                    <p class="reviews-empty">No reviews yet. Be the first to add one!</p>
                @else
                    <ul class="team">
                        @foreach ($reviews as $review)
                            <li class="{{ $review->position }}">
                                <div class="thumb"><img src="{{ asset('img/avatar.svg') }}" alt="" width="120" height="120" loading="lazy"></div>
                                <div class="description">
                                    <h3>{{ $review->name }}</h3>
                                    <p>{{ $review->text }}<br><a href="{{ $review->website }}" target="_blank" rel="nofollow noopener noreferrer">{{ '@'.$review->username }}</a></p>
                                    @if ($review->canBeDeletedBy(auth()->user()))
                                        <form action="{{ route('reviews.delete', $review) }}" method="POST" class="review-delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="review-delete">Delete</button>
                                        </form>
                                    @endif
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
</section>

<section class="section section-alt" id="add-review">
    <div class="container container-narrow">
        <div class="section-header center">
            <span class="eyebrow">Share your stay</span>
            <h2 class="color-change">Add Review</h2>
            <p class="lead">Posting as {{ auth()->user()->name }}.</p>
        </div>
        <form action="{{ route('reviews.add') }}" method="POST" class="card form-card form-grid">
            @csrf
            <div class="field">
                <label for="username">Username</label>
                <input id="username" name="username" type="text" value="{{ old('username') }}" maxlength="30" required
                    @error('username') aria-invalid="true" aria-describedby="username-error" @enderror>
                @error('username')
                    <span class="error-message" id="username-error">{{ $message }}</span>
                @enderror
            </div>
            <div class="field">
                <label for="url">Website URL</label>
                <input id="url" name="url" type="url" value="{{ old('url') }}" placeholder="https://" required
                    @error('url') aria-invalid="true" aria-describedby="url-error" @enderror>
                @error('url')
                    <span class="error-message" id="url-error">{{ $message }}</span>
                @enderror
            </div>
            <div class="field field-full">
                <label for="review">Write your Review</label>
                <textarea id="review" name="review" rows="5" minlength="100" maxlength="300" required aria-describedby="review-hint @error('review') review-error @enderror"
                    @error('review') aria-invalid="true" @enderror>{{ old('review') }}</textarea>
                <span class="field-hint" id="review-hint">Between 100 and 300 characters.</span>
                @error('review')
                    <span class="error-message" id="review-error">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Add Review</button>
            </div>
        </form>
    </div>
</section>
@endsection
