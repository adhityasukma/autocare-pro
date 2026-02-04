<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $testimonials = [
            [
                'name' => 'John Smith',
                'position' => 'Business Owner',
                'company' => 'Smith Enterprises',
                'content' => 'Outstanding service! They fixed my car quickly and at a fair price. The team was professional and explained everything clearly. Highly recommended!',
                'image' => '',
                'rating' => 5,
                'order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Sarah Johnson',
                'position' => 'Marketing Manager',
                'company' => 'Tech Solutions Inc',
                'content' => 'I\'ve been bringing my car here for years. Always reliable, honest, and thorough. They treat every customer like family.',
                'image' => '',
                'rating' => 5,
                'order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Michael Chen',
                'position' => 'Software Engineer',
                'company' => 'Digital Corp',
                'content' => 'Best automotive shop in town! They diagnosed a problem that two other shops couldn\'t find. Excellent expertise and customer service.',
                'image' => '',
                'rating' => 5,
                'order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Emily Davis',
                'position' => 'Teacher',
                'company' => 'Lincoln High School',
                'content' => 'Fair prices and honest work. They never try to upsell unnecessary services. A trustworthy shop that I recommend to everyone.',
                'image' => '',
                'rating' => 4,
                'order' => 4,
                'is_active' => true,
            ],
            [
                'name' => 'John Smith 2',
                'position' => 'Business Owner',
                'company' => 'Smith Enterprises',
                'content' => 'Outstanding service! They fixed my car quickly and at a fair price. The team was professional and explained everything clearly. Highly recommended!',
                'image' => '',
                'rating' => 5,
                'order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Sarah Johnson 2',
                'position' => 'Marketing Manager',
                'company' => 'Tech Solutions Inc',
                'content' => 'I\'ve been bringing my car here for years. Always reliable, honest, and thorough. They treat every customer like family.',
                'image' => '',
                'rating' => 5,
                'order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Michael Chen 2',
                'position' => 'Software Engineer',
                'company' => 'Digital Corp',
                'content' => 'Best automotive shop in town! They diagnosed a problem that two other shops couldn\'t find. Excellent expertise and customer service.',
                'image' => '',
                'rating' => 5,
                'order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Emily Davis 2',
                'position' => 'Teacher',
                'company' => 'Lincoln High School',
                'content' => 'Fair prices and honest work. They never try to upsell unnecessary services. A trustworthy shop that I recommend to everyone.',
                'image' => '',
                'rating' => 4,
                'order' => 4,
                'is_active' => true,
            ],
             [
                'name' => 'John Smith 3',
                'position' => 'Business Owner',
                'company' => 'Smith Enterprises',
                'content' => 'Outstanding service! They fixed my car quickly and at a fair price. The team was professional and explained everything clearly. Highly recommended!',
                'image' => '',
                'rating' => 5,
                'order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Sarah Johnson 3',
                'position' => 'Marketing Manager',
                'company' => 'Tech Solutions Inc',
                'content' => 'I\'ve been bringing my car here for years. Always reliable, honest, and thorough. They treat every customer like family.',
                'image' => '',
                'rating' => 5,
                'order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Michael Chen 3',
                'position' => 'Software Engineer',
                'company' => 'Digital Corp',
                'content' => 'Best automotive shop in town! They diagnosed a problem that two other shops couldn\'t find. Excellent expertise and customer service.',
                'image' => '',
                'rating' => 5,
                'order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Emily Davis 3',
                'position' => 'Teacher',
                'company' => 'Lincoln High School',
                'content' => 'Fair prices and honest work. They never try to upsell unnecessary services. A trustworthy shop that I recommend to everyone.',
                'image' => '',
                'rating' => 4,
                'order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }
    }
}
