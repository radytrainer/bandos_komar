<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;

Route::get('lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'km'])) {
        session()->put('locale', $locale);
    }
    return back();
})->name('lang.switch');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/history', [HomeController::class, 'history'])->name('history');
Route::get('/programs', [HomeController::class, 'programs'])->name('programs');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact', [\App\Http\Controllers\ContactController::class, 'submit'])->name('contact.submit');

Route::get('/resources/annual-report', [HomeController::class, 'annualReport'])->name('resources.annual-report');
Route::get('/resources/publication', [HomeController::class, 'publication'])->name('resources.publication');
Route::get('/resources/photo-gallery', [HomeController::class, 'photoGallery'])->name('resources.photo-gallery');
Route::get('/resources/video-center', [HomeController::class, 'videoCenter'])->name('resources.video-center');

Route::get('/get-involved/support-us', [HomeController::class, 'supportUs'])->name('get-involved.support-us');
Route::get('/get-involved/sponsor-child', [HomeController::class, 'sponsorChild'])->name('get-involved.sponsor-child');
Route::get('/get-involved/ways-to-give', [HomeController::class, 'waysToGive'])->name('get-involved.ways-to-give');
Route::get('/get-involved/career', [HomeController::class, 'career'])->name('get-involved.career');

Route::get('/donate', [HomeController::class, 'donate'])->name('donate');

Route::get('/posts', [\App\Http\Controllers\PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{post}', [\App\Http\Controllers\PostController::class, 'show'])->name('posts.show');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Routes
Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin,staff'])->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    
    // Profile routes
    Route::get('/profile', [\App\Http\Controllers\Admin\ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [\App\Http\Controllers\Admin\ProfileController::class, 'update'])->name('profile.update');
    
    // Admin only routes
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/users', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('users.index');
        Route::get('/donations', [\App\Http\Controllers\Admin\DonationController::class, 'index'])->name('donations.index');
    });

    // Admin and Staff routes
    Route::resource('posts', \App\Http\Controllers\Admin\PostController::class);
    Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('pages', \App\Http\Controllers\Admin\PageController::class);
});
