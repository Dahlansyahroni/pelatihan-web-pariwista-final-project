<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ZoneController;
use App\Http\Controllers\AttractionController;
use App\Http\Controllers\ReviewController;
use App\Models\Zone;
use App\Models\Attraction;

Route::get('/', function () {
    $zones = Zone::all();
    $attractions = Attraction::all();
    return view('landing.pages.index', compact('zones', 'attractions'));
});
Route::get('detail/{zone}', function (Zone $zone) {
    $zone->load(['attractions.reviews.user']);
    return view('landing.pages.detail', compact('zone'));
})->name('zone.detail');
Route::prefix('admin')->name('admin.')->group( function() {
    Route::get('/', function() {
        $zones_count = \App\Models\Zone::count();
        $attractions_count = \App\Models\Attraction::count();
        $reviews_count = \App\Models\Review::count();
        return view('admin.pages.index', compact('zones_count', 'attractions_count', 'reviews_count'));
    })->name('index');

    Route::resource('zones', ZoneController::class);
    Route::resource('attractions', AttractionController::class);
    Route::resource('reviews', ReviewController::class)->only(['index', 'destroy']);

});

Route::post('reviews', [ReviewController::class, 'store'])->name('reviews.store');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
