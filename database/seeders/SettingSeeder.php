<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            ['key' => 'site_name', 'value' => 'AutoCare Pro', 'type' => 'text'],
            ['key' => 'site_tagline', 'value' => 'Premium Automotive Services', 'type' => 'text'],
            ['key' => 'site_logo', 'value' => '', 'type' => 'image'],
            ['key' => 'site_favicon', 'value' => '', 'type' => 'image'],
            ['key' => 'footer_text', 'value' => '© 2024 AutoCare Pro. All Rights Reserved.', 'type' => 'text'],
            ['key' => 'primary_color', 'value' => '#e63946', 'type' => 'color'],
            ['key' => 'secondary_color', 'value' => '#1d3557', 'type' => 'color'],
        ];

        foreach ($settings as $setting) {
            Setting::create($setting);
        }
    }
}
