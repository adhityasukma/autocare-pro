<?php

namespace Database\Seeders;

use App\Models\Feature;
use Illuminate\Database\Seeder;

class FeatureSeeder extends Seeder
{
    public function run(): void
    {
        $features = [
            [
                'title' => 'Certified Technicians',
                'description' => 'Our team consists of ASE-certified professionals with years of experience in automotive repair.',
                'icon' => 'bi-award-fill',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Quality Parts',
                'description' => 'We use only genuine OEM and high-quality aftermarket parts for all repairs and replacements.',
                'icon' => 'bi-shield-check',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Affordable Pricing',
                'description' => 'Competitive and transparent pricing with no hidden fees. Get the best value for your money.',
                'icon' => 'bi-tag-fill',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Quick Turnaround',
                'description' => 'Fast and efficient service to get you back on the road as quickly as possible.',
                'icon' => 'bi-clock-fill',
                'order' => 4,
                'is_active' => true,
            ],
            [
                'title' => 'Warranty Included',
                'description' => 'All our services come with a comprehensive warranty for your peace of mind.',
                'icon' => 'bi-patch-check-fill',
                'order' => 5,
                'is_active' => true,
            ],
            [
                'title' => 'Free Diagnostics',
                'description' => 'Complimentary vehicle diagnostics to accurately identify and address any issues.',
                'icon' => 'bi-search',
                'order' => 6,
                'is_active' => true,
            ],
        ];

        foreach ($features as $feature) {
            Feature::create($feature);
        }
    }
}
