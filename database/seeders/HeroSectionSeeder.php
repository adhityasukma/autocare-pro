<?php

namespace Database\Seeders;

use App\Models\HeroSection;
use Illuminate\Database\Seeder;

class HeroSectionSeeder extends Seeder
{
    public function run(): void
    {
        HeroSection::create([
            'title' => 'Premium Automotive Services',
            'subtitle' => 'Your Trusted Partner for All Vehicle Needs',
            'description' => 'We provide top-quality automotive services with certified technicians and state-of-the-art equipment. From routine maintenance to complex repairs, we\'ve got you covered.',
            'button_text' => 'Explore Our Services',
            'button_link' => '#services',
            'image' => '',
            'is_active' => true,
        ]);
    }
}
