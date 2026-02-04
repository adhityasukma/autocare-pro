<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    public function run(): void
    {
        $galleries = [
            [
                'title' => 'Engine Overhaul',
                'description' => 'Complete engine rebuild project',
                'image' => '',
                'category' => 'Engine',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Custom Paint Job',
                'description' => 'Metallic blue custom painting',
                'image' => '',
                'category' => 'Body Work',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Brake System Upgrade',
                'description' => 'Performance brake installation',
                'image' => '',
                'category' => 'Brakes',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Interior Restoration',
                'description' => 'Classic car interior restoration',
                'image' => '',
                'category' => 'Interior',
                'order' => 4,
                'is_active' => true,
            ],
            [
                'title' => 'Suspension Work',
                'description' => 'Lowering kit installation',
                'image' => '',
                'category' => 'Suspension',
                'order' => 5,
                'is_active' => true,
            ],
            [
                'title' => 'Wheel Alignment',
                'description' => 'Precision wheel alignment service',
                'image' => '',
                'category' => 'Tires',
                'order' => 6,
                'is_active' => true,
            ],
             [
                'title' => 'Engine Overhaul 2',
                'description' => 'Complete engine rebuild project',
                'image' => '',
                'category' => 'Engine',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Custom Paint Job 2',
                'description' => 'Metallic blue custom painting',
                'image' => '',
                'category' => 'Body Work',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Brake System Upgrade 2',
                'description' => 'Performance brake installation',
                'image' => '',
                'category' => 'Brakes',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Interior Restoration 2',
                'description' => 'Classic car interior restoration',
                'image' => '',
                'category' => 'Interior',
                'order' => 4,
                'is_active' => true,
            ],
            [
                'title' => 'Suspension Work 2',
                'description' => 'Lowering kit installation',
                'image' => '',
                'category' => 'Suspension',
                'order' => 5,
                'is_active' => true,
            ],
            [
                'title' => 'Wheel Alignment 2',
                'description' => 'Precision wheel alignment service',
                'image' => '',
                'category' => 'Tires',
                'order' => 6,
                'is_active' => true,
            ],
        ];

        foreach ($galleries as $gallery) {
            Gallery::create($gallery);
        }
    }
}
