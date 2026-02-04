<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LandingPageController;

Route::get('/landing/hero', [LandingPageController::class, 'hero']);
Route::get('/landing/services', [LandingPageController::class, 'services']);
Route::get('/landing/about', [LandingPageController::class, 'about']);
Route::get('/landing/features', [LandingPageController::class, 'features']);
Route::get('/landing/testimonials', [LandingPageController::class, 'testimonials']);
Route::get('/landing/galleries', [LandingPageController::class, 'galleries']);
Route::get('/landing/contact', [LandingPageController::class, 'contact']);
Route::get('/landing/settings', [LandingPageController::class, 'settings']);
Route::get('/landing/all', [LandingPageController::class, 'all']);
