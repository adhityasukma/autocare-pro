<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            HeroSectionSeeder::class,
            ServiceSeeder::class,
            AboutSectionSeeder::class,
            FeatureSeeder::class,
            TestimonialSeeder::class,
            GallerySeeder::class,
            ContactSeeder::class,
            SettingSeeder::class,
        ]);
    }
}
