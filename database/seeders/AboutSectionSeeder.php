<?php

namespace Database\Seeders;

use App\Models\AboutSection;
use Illuminate\Database\Seeder;

class AboutSectionSeeder extends Seeder
{
    public function run(): void
    {
        AboutSection::create([
            'title' => 'About AutoCare Pro',
            'description' => 'Leading automotive service provider since 2005',
            'content' => 'AutoCare Pro has been serving the community with exceptional automotive services for over 18 years. Our team of certified technicians is dedicated to providing honest, reliable, and affordable car care. We use the latest diagnostic equipment and genuine parts to ensure your vehicle receives the best treatment possible. Our state-of-the-art facility is designed to handle all makes and models, from routine maintenance to complex repairs.',
            'image' => '',
            'experience_years' => 18,
            'happy_customers' => 15000,
            'projects_completed' => 25000,
            'is_active' => true,
        ]);
    }
}
