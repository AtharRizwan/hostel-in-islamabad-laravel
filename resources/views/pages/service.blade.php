@extends('layouts.app')

@section('title', 'Services - Hostel in Islamabad')

@include('partials.header')

@section('content')
<main>
    <section class="product-details">
    <h1>{{ $service->name }}</h1>
    <ul>
        {{ $service->long_description }}
    </ul>
    </section>


@if (Auth::check() && Auth::user()->role === 'admin'){
<section class="edit-service">
<div class="reviews_title">
    <h2>Update Service</h2>
</div>
<div class="container">
    <form action="{{ route('service.update', $service->id) }}" method='POST'>
        @csrf
        <div class="form-row">
            <div class="input-data">
                <input id="name" type="text" name="name" value="{{ old('name') }}" required>
                <div class="underline"></div>
                <label for=""> New Title</label>
            </div>
        </div>
        <div class="form-row">
            <div class="input-data">
                <input id="price" type="text" name="price" value="{{ old('price') }}" required>
                <div class="underline"></div>
                <label for=""> New Price</label>
            </div>
        </div>
        <div class="form-row">
            <div class="input-data">
                <input id="description" type="text" name="description" value="{{ old('New description') }}" required>
                <div class="underline"></div>
                <label for=""> New Description</label>
            </div>
        </div>
        <div class="form-row">
            <div class="input-data textarea">
                <textarea rows="8" cols="80" name="long_description" value="{{ old('long_description') }}" required></textarea>
                <br />
                <div class="underline"></div>
                <label for=""> New Long Description</label>
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
                        <input id="addReviewButton" type="submit" value="Update Service">
                    </div>
                </div>
            </div>
    </form>
</div>
    </section>
@endif

}
</main>

@endsection

