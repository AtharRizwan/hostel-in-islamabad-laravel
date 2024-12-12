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
</main>

@endsection

