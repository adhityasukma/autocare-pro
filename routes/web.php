<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\SettingController;

// Landing Page
Route::get('/', [LandingController::class, 'index'])->name('landing');

// Auth Routes
Route::get('/admin/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/admin/login', [LoginController::class, 'login']);
Route::post('/admin/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/admin/logout', [LoginController::class, 'logout']);

// Admin Routes
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
    
    // Hero
    Route::get('/hero', [HeroController::class, 'index'])->name('admin.hero.index');
    Route::get('/hero/create', [HeroController::class, 'create'])->name('admin.hero.create');
    Route::post('/hero', [HeroController::class, 'store'])->name('admin.hero.store');
    Route::get('/hero/{hero}/edit', [HeroController::class, 'edit'])->name('admin.hero.edit');
    Route::put('/hero/{hero}', [HeroController::class, 'update'])->name('admin.hero.update');
    Route::post('/hero/bulk-status', [HeroController::class, 'bulkStatus'])->name('admin.hero.bulk_status');
    Route::delete('/hero/bulk-destroy', [HeroController::class, 'bulkDestroy'])->name('admin.hero.bulk_destroy');
    Route::delete('/hero/{hero}', [HeroController::class, 'destroy'])->name('admin.hero.destroy');
    
    // Services
    Route::get('/services', [ServiceController::class, 'index'])->name('admin.services.index');
    Route::get('/services/create', [ServiceController::class, 'create'])->name('admin.services.create');
    Route::post('/services', [ServiceController::class, 'store'])->name('admin.services.store');
    Route::get('/services/{service}/edit', [ServiceController::class, 'edit'])->name('admin.services.edit');
    Route::put('/services/{service}', [ServiceController::class, 'update'])->name('admin.services.update');
    Route::post('/services/bulk-status', [ServiceController::class, 'bulkStatus'])->name('admin.services.bulk_status');
    Route::delete('/services/bulk-destroy', [ServiceController::class, 'bulkDestroy'])->name('admin.services.bulk_destroy');
    Route::delete('/services/{service}', [ServiceController::class, 'destroy'])->name('admin.services.destroy');
    
    // About
    Route::get('/about', [AboutController::class, 'index'])->name('admin.about.index');
    Route::put('/about', [AboutController::class, 'update'])->name('admin.about.update');
    
    // Features
    Route::get('/features', [FeatureController::class, 'index'])->name('admin.features.index');
    Route::get('/features/create', [FeatureController::class, 'create'])->name('admin.features.create');
    Route::post('/features', [FeatureController::class, 'store'])->name('admin.features.store');
    Route::get('/features/{feature}/edit', [FeatureController::class, 'edit'])->name('admin.features.edit');
    Route::put('/features/{feature}', [FeatureController::class, 'update'])->name('admin.features.update');
    Route::post('/features/bulk-status', [FeatureController::class, 'bulkStatus'])->name('admin.features.bulk_status');
    Route::delete('/features/bulk-destroy', [FeatureController::class, 'bulkDestroy'])->name('admin.features.bulk_destroy');
    Route::delete('/features/{feature}', [FeatureController::class, 'destroy'])->name('admin.features.destroy');
    
    // Testimonials
    Route::get('/testimonials', [TestimonialController::class, 'index'])->name('admin.testimonials.index');
    Route::get('/testimonials/create', [TestimonialController::class, 'create'])->name('admin.testimonials.create');
    Route::post('/testimonials', [TestimonialController::class, 'store'])->name('admin.testimonials.store');
    Route::get('/testimonials/{testimonial}/edit', [TestimonialController::class, 'edit'])->name('admin.testimonials.edit');
    Route::put('/testimonials/{testimonial}', [TestimonialController::class, 'update'])->name('admin.testimonials.update');
    Route::post('/testimonials/bulk-status', [TestimonialController::class, 'bulkStatus'])->name('admin.testimonials.bulk_status');
    Route::delete('/testimonials/bulk-destroy', [TestimonialController::class, 'bulkDestroy'])->name('admin.testimonials.bulk_destroy');
    Route::delete('/testimonials/{testimonial}', [TestimonialController::class, 'destroy'])->name('admin.testimonials.destroy');
    
    // Galleries
    Route::get('/galleries', [GalleryController::class, 'index'])->name('admin.galleries.index');
    Route::get('/galleries/create', [GalleryController::class, 'create'])->name('admin.galleries.create');
    Route::post('/galleries', [GalleryController::class, 'store'])->name('admin.galleries.store');
    Route::get('/galleries/{gallery}/edit', [GalleryController::class, 'edit'])->name('admin.galleries.edit');
    Route::put('/galleries/{gallery}', [GalleryController::class, 'update'])->name('admin.galleries.update');
    Route::post('/galleries/bulk-status', [GalleryController::class, 'bulkStatus'])->name('admin.galleries.bulk_status');
    Route::delete('/galleries/bulk-destroy', [GalleryController::class, 'bulkDestroy'])->name('admin.galleries.bulk_destroy');
    Route::delete('/galleries/{gallery}', [GalleryController::class, 'destroy'])->name('admin.galleries.destroy');
    
    
    // Contact
    Route::get('/contact', [ContactController::class, 'index'])->name('admin.contact.index');
    Route::put('/contact', [ContactController::class, 'update'])->name('admin.contact.update');
    
    // Settings
    Route::get('/settings', [SettingController::class, 'index'])->name('admin.settings.index');
    Route::put('/settings', [SettingController::class, 'update'])->name('admin.settings.update');
});

