<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'title' => 'Engine Repair',
                'description' => 'Complete engine diagnostics and repair services. Our expert mechanics can handle any engine problem with precision.',
                'icon' => 'bi-gear-fill',
                'image' => '',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Oil Change',
                'description' => 'Quick and professional oil change services using premium quality oils and filters for optimal engine performance.',
                'icon' => 'bi-droplet-fill',
                'image' => '',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Brake Service',
                'description' => 'Comprehensive brake inspection, repair, and replacement services to ensure your safety on the road.',
                'icon' => 'bi-disc-fill',
                'image' => '',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Tire Service',
                'description' => 'Full tire services including rotation, balancing, alignment, and replacement with top brand options.',
                'icon' => 'bi-circle',
                'image' => '',
                'order' => 4,
                'is_active' => true,
            ],
            [
                'title' => 'AC Repair',
                'description' => 'Keep cool with our air conditioning repair and maintenance services. We handle all AC system issues.',
                'icon' => 'bi-snow',
                'image' => '',
                'order' => 5,
                'is_active' => true,
            ],
            [
                'title' => 'Body Work',
                'description' => 'Professional body repair and painting services to restore your vehicle to its original beauty.',
                'icon' => 'bi-brush-fill',
                'image' => '',
                'order' => 6,
                'is_active' => true,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
