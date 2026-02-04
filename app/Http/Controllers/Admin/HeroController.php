<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeroController extends Controller
{
    public function index()
    {
        $heroes = HeroSection::orderBy('order')->paginate(10);
        return view('admin.hero.index', compact('heroes'));
    }

    public function create()
    {
        return view('admin.hero.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'subtitle' => 'nullable|max:255',
            'description' => 'nullable',
            'button_text' => 'nullable|max:255',
            'button_link' => 'nullable|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'order' => 'nullable|integer',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('heroes', 'public');
        }

        $validated['is_active'] = $request->has('is_active');
        $validated['order'] = $request->input('order', 0);

        HeroSection::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Hero slide created successfully!'
        ]);
    }

    public function edit(HeroSection $hero)
    {
        return view('admin.hero.edit', compact('hero'));
    }

    public function update(Request $request, HeroSection $hero)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'subtitle' => 'nullable|max:255',
            'description' => 'nullable',
            'button_text' => 'nullable|max:255',
            'button_link' => 'nullable|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'order' => 'nullable|integer',
        ]);

        if ($request->hasFile('image')) {
            if ($hero->image) {
                Storage::disk('public')->delete($hero->image);
            }
            $validated['image'] = $request->file('image')->store('heroes', 'public');
        } elseif ($request->input('remove_image') == '1') {
            if ($hero->image) {
                Storage::disk('public')->delete($hero->image);
            }
            $validated['image'] = null;
        }

        $validated['is_active'] = $request->has('is_active');
        $validated['order'] = $request->input('order', 0);
        
        $hero->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Hero slide updated successfully!'
        ]);
    }

    public function destroy(HeroSection $hero)
    {
        if ($hero->image) {
            Storage::disk('public')->delete($hero->image);
        }
        $hero->delete();

        return response()->json([
            'success' => true,
            'message' => 'Hero slide deleted successfully!'
        ]);
    }

    public function bulkStatus(Request $request)
    {
        $ids = $request->ids;
        $status = $request->status;
        HeroSection::whereIn('id', $ids)->update(['is_active' => $status]);

        return response()->json([
            'success' => true,
            'message' => 'Status updated successfully!'
        ]);
    }

    public function bulkDestroy(Request $request)
    {
        $ids = $request->ids;
        $heroes = HeroSection::whereIn('id', $ids)->get();

        foreach ($heroes as $hero) {
            if ($hero->image) {
                Storage::disk('public')->delete($hero->image);
            }
            $hero->delete();
        }

        return response()->json([
            'success' => true,
            'message' => 'Selected slides deleted successfully!'
        ]);
    }
}
