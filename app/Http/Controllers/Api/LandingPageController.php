<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\HeroSection;
use App\Models\Service;
use App\Models\AboutSection;
use App\Models\Feature;
use App\Models\Testimonial;
use App\Models\Gallery;
use App\Models\Contact;
use App\Models\Setting;

class LandingPageController extends Controller
{
    public function hero()
    {
        $heroes = HeroSection::where('is_active', true)->orderBy('order')->get();
        return response()->json($heroes);
    }

    public function services()
    {
        $services = Service::where('is_active', true)->orderBy('order')->get();
        return response()->json($services);
    }

    public function about()
    {
        $about = AboutSection::where('is_active', true)->first();
        return response()->json($about);
    }

    public function features()
    {
        $features = Feature::where('is_active', true)->orderBy('order')->get();
        return response()->json($features);
    }

    public function testimonials()
    {
        $testimonials = Testimonial::where('is_active', true)->orderBy('order')->get();
        return response()->json($testimonials);
    }

    public function galleries()
    {
        $galleries = Gallery::where('is_active', true)->orderBy('order')->get();
        return response()->json($galleries);
    }

    public function contact()
    {
        $contact = Contact::where('is_active', true)->first();
        return response()->json($contact);
    }

    public function settings()
    {
        $settings = Setting::all()->pluck('value', 'key');
        return response()->json($settings);
    }

    public function all()
    {
        return response()->json([
            'hero' => HeroSection::where('is_active', true)->orderBy('order')->get(),
            'services' => Service::where('is_active', true)->orderBy('order')->get(),
            'about' => AboutSection::where('is_active', true)->first(),
            'features' => Feature::where('is_active', true)->orderBy('order')->get(),
            'testimonials' => Testimonial::where('is_active', true)->orderBy('order')->get(),
            'galleries' => Gallery::where('is_active', true)->orderBy('order')->get(),
            'contact' => Contact::where('is_active', true)->first(),
            'settings' => Setting::all()->pluck('value', 'key'),
        ]);
    }
}
