<?php

use App\Http\Controllers\AddReview;
use App\Http\Controllers\UpdateService;
use Illuminate\Support\Facades\Route;
use App\Models\Service;
use App\Models\Review;

Route::get('/', function() {
    // Redirect to login
    return redirect()->route('login');
});

Route::middleware('auth')->group(function () {
    Route::get('/home', function () {
        // The first three services are featured on the home page
        $featured = Service::orderBy('id')->take(3)->get();
        return view('pages.home', compact('featured'));
    })->name('home');

    Route::get('/about', function () {
        return view('pages.about');
    })->name('about');

    Route::get('/services', function () {
        $services = Service::all();
        $reviews = Review::all();
        return view('pages.services', compact('services', 'reviews'));
    })->name('services');

    Route::post('/reviews', [AddReview::class, 'add'])->name('reviews.add');

    Route::delete('/reviews/{review}', [AddReview::class, 'delete'])->name('reviews.delete');

    Route::get('/services/{service}', function (Service $service) {
        $others = Service::whereKeyNot($service->id)->get();
        return view('pages.service', compact('service', 'others'));
    })->name('service.show');

    Route::put('/services/{service}', [UpdateService::class, 'update'])->name('service.update');
});

require __DIR__.'/auth.php';
