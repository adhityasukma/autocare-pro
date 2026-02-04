<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    public function run(): void
    {
        Contact::create([
            'address' => '123 Auto Street, Motor City, MC 12345',
            'phone' => '+1 (555) 123-4567',
            'email' => 'info@autocarepro.com',
            'whatsapp' => '+15551234567',
            'map_embed' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.521260322283!2d106.8195613!3d-6.194741399999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5390917b759%3A0x6b45e67356080477!2sJakarta%2C%20Indonesia!5e0!3m2!1sen!2sus!4v1635000000000!5m2!1sen!2sus" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',
            'facebook' => 'https://facebook.com/autocarepro',
            'instagram' => 'https://instagram.com/autocarepro',
            'twitter' => 'https://twitter.com/autocarepro',
            'youtube' => 'https://youtube.com/autocarepro',
            'working_hours' => 'Monday - Friday: 8:00 AM - 6:00 PM
Saturday: 9:00 AM - 4:00 PM
Sunday: Closed',
            'is_active' => true,
        ]);
    }
}
