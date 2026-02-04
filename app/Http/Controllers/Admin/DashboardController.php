<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSection;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\Gallery;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'services' => Service::count(),
            'testimonials' => Testimonial::count(),
            'galleries' => Gallery::count(),
        ];
        
        return view('admin.dashboard', compact('stats'));
    }
}
