<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->pluck('value', 'key')->toArray();
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'site_name' => 'nullable|max:255',
            'site_tagline' => 'nullable|max:255',
            'site_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'site_favicon' => 'nullable|image|mimes:ico,png,jpg|max:1024',
            'footer_text' => 'nullable',
            'primary_color' => 'nullable|max:7',
            'secondary_color' => 'nullable|max:7',
        ]);

        foreach (['site_name', 'site_tagline', 'footer_text', 'primary_color', 'secondary_color'] as $key) {
            if (isset($validated[$key])) {
                Setting::set($key, $validated[$key], 'text');
            }
        }

        if ($request->hasFile('site_logo')) {
            $oldLogo = Setting::get('site_logo');
            if ($oldLogo && Storage::disk('public')->exists($oldLogo)) {
                Storage::disk('public')->delete($oldLogo);
            }
            $path = $request->file('site_logo')->store('settings', 'public');
            Setting::set('site_logo', $path, 'image');
        } elseif ($request->input('remove_site_logo') == '1') {
            $oldLogo = Setting::get('site_logo');
            if ($oldLogo && Storage::disk('public')->exists($oldLogo)) {
                Storage::disk('public')->delete($oldLogo);
            }
            Setting::set('site_logo', '', 'image');
        }

        if ($request->hasFile('site_favicon')) {
            $oldFavicon = Setting::get('site_favicon');
            if ($oldFavicon && Storage::disk('public')->exists($oldFavicon)) {
                Storage::disk('public')->delete($oldFavicon);
            }
            $path = $request->file('site_favicon')->store('settings', 'public');
            Setting::set('site_favicon', $path, 'image');
        } elseif ($request->input('remove_site_favicon') == '1') {
            $oldFavicon = Setting::get('site_favicon');
            if ($oldFavicon && Storage::disk('public')->exists($oldFavicon)) {
                Storage::disk('public')->delete($oldFavicon);
            }
            Setting::set('site_favicon', '', 'image');
        }

        return response()->json([
            'success' => true,
            'message' => 'Settings updated successfully!'
        ]);
    }
}
