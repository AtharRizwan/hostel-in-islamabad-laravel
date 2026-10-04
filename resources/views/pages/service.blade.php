@extends('layouts.app')

@section('title', $service->name.' - Hostel in Islamabad')
@section('description', $service->description)

@push('styles')
    @vite('resources/css/service-detail.css')
@endpush

@section('content')
<section class="section service-detail">
    <div class="container">
        <nav class="breadcrumb" aria-label="Breadcrumb">
            <ol>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('services') }}">Services</a></li>
                <li aria-current="page">{{ $service->name }}</li>
            </ol>
        </nav>
        <div class="two-col">
            <div class="service-media">
                <img src="{{ asset($service->image_link) }}" alt="{{ $service->name }}">
            </div>
            <div class="service-copy">
                <span class="eyebrow">Our services</span>
                <h1 class="color-change">{{ $service->name }}</h1>
                <ul class="check-list">
                    @foreach ($service->featureLines() as $line)
                        <li>{{ $line }}</li>
                    @endforeach
                </ul>
                <div class="price-box">
                    <span class="price-label">Price</span>
                    <span class="price-value">{{ $service->price }}</span>
                </div>
                <div class="service-actions">
                    <a href="{{ route('about') }}#contact" class="btn btn-primary">Ask about this</a>
                    <a href="{{ route('services') }}" class="btn btn-outline">&larr; All services</a>
                </div>
            </div>
        </div>
    </div>
</section>

@if (auth()->user()->isAdmin())
    <section class="section" id="edit-service">
        <div class="container container-narrow">
            <div class="section-header center">
                <span class="eyebrow">Admin</span>
                <h2 class="color-change">Update Service</h2>
                <p class="lead">Changes are visible to all guests straight away.</p>
            </div>
            <form action="{{ route('service.update', $service) }}" method="POST" class="card form-card form-grid">
                @csrf
                @method('PUT')
                <div class="field">
                    <label for="name">Title</label>
                    <input id="name" name="name" type="text" value="{{ old('name', $service->name) }}" maxlength="255" required
                        @error('name') aria-invalid="true" aria-describedby="name-error" @enderror>
                    @error('name')
                        <span class="error-message" id="name-error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="field">
                    <label for="price">Price</label>
                    <input id="price" name="price" type="text" value="{{ old('price', $service->price) }}" maxlength="255" required
                        @error('price') aria-invalid="true" aria-describedby="price-error" @enderror>
                    @error('price')
                        <span class="error-message" id="price-error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="field field-full">
                    <label for="description">Short description</label>
                    <input id="description" name="description" type="text" value="{{ old('description', $service->description) }}" maxlength="255" required
                        @error('description') aria-invalid="true" aria-describedby="description-error" @enderror>
                    @error('description')
                        <span class="error-message" id="description-error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="field field-full">
                    <label for="long_description">Details</label>
                    <textarea id="long_description" name="long_description" rows="6" required aria-describedby="long-description-hint @error('long_description') long-description-error @enderror"
                        @error('long_description') aria-invalid="true" @enderror>{{ old('long_description', $service->long_description) }}</textarea>
                    <span class="field-hint" id="long-description-hint">One point per line. Wrap words in **double asterisks** to make them bold.</span>
                    @error('long_description')
                        <span class="error-message" id="long-description-error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </section>
@endif

@if ($others->isNotEmpty())
    <section class="section section-alt more-services">
        <div class="container">
            <div class="section-header">
                <h2 class="color-change">More services</h2>
            </div>
            <div class="grid">
                @foreach ($others as $other)
                    <a href="{{ route('service.show', $other) }}" class="card card-link">
                        <div class="card-media">
                            <img src="{{ asset($other->image_link) }}" alt="" loading="lazy">
                        </div>
                        <div class="card-body">
                            <span class="chip">{{ $other->price }}</span>
                            <h3>{{ $other->name }}</h3>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
@endif
@endsection
