<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function index()
    {
        $about = AboutSection::first();
        return view('admin.about.index', compact('about'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'content' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'video_url' => 'nullable|max:255',
            'experience_years' => 'nullable|integer',
            'happy_customers' => 'nullable|integer',
            'projects_completed' => 'nullable|integer',
        ]);

        $about = AboutSection::first();

        if ($request->hasFile('image')) {
            if ($about && $about->image) {
                Storage::disk('public')->delete($about->image);
            }
            $validated['image'] = $request->file('image')->store('about', 'public');
        } elseif ($request->input('remove_image') == '1') {
            if ($about && $about->image) {
                Storage::disk('public')->delete($about->image);
            }
            $validated['image'] = null;
        }

        $validated['is_active'] = $request->has('is_active');

        if ($about) {
            $about->update($validated);
        } else {
            AboutSection::create($validated);
        }

        return response()->json([
            'success' => true,
            'message' => 'About section updated successfully!'
        ]);
    }
}
