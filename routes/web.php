<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AddReview;
use App\Http\Controllers\UpdateService;
use Illuminate\Support\Facades\Route;
use App\Models\Service;
use App\Models\Review;

Route::get('/login', function() {
    return "hello world";
})->name('login');

Route::get('/home', function () {
    return view('pages.home');
})->name('home');

Route::get('/about', function () {
    return view('pages.about');
})->name('about');

Route::get('/services', function () {
    $services = Service::all();
    $reviews = Review::all();
    return view('pages.services', compact('services', 'reviews'));
})->name('services');

Route::post('/services', [AddReview::class, 'add'])->name('reviews.add');

Route::post('/reviews/{id}', [AddReview::class, 'delete'])->name('reviews.delete');


Route::get('/services/{service}', function (Service $service) {
    return view('pages.service', compact('service'));
})->name('service.show');

Route::post('/services/{service}', [UpdateService::class, 'update'])->name('service.update');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
