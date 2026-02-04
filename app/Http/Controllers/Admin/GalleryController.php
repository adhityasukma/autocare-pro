<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $query = Gallery::query();

        // Search
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('category', 'like', "%{$search}%");
            });
        }

        // Ordering
        $query->orderBy('order', 'asc')->orderBy('created_at', 'desc');

        // Pagination
        $perPage = $request->input('per_page', 10);
        if ($perPage == 'all') {
            $galleries = $query->get();
        } else {
            $galleries = $query->paginate((int)$perPage)->withQueryString();
        }

        return view('admin.galleries.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.galleries.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'category' => 'nullable|max:255',
            'order' => 'nullable|integer',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('images/gallery', 'public');
        }

        $validated['is_active'] = $request->has('is_active');
        $validated['order'] = $validated['order'] ?? 0;
        
        Gallery::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Gallery item created successfully!'
        ]);
    }

    public function edit(Gallery $gallery)
    {
        return view('admin.galleries.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'category' => 'nullable|max:255',
            'order' => 'nullable|integer',
        ]);

        if ($request->hasFile('image')) {
            if ($gallery->image) {
                Storage::disk('public')->delete($gallery->image);
            }
            $validated['image'] = $request->file('image')->store('images/gallery', 'public');
        } elseif ($request->input('remove_image') == '1') {
            if ($gallery->image) {
                Storage::disk('public')->delete($gallery->image);
            }
            $validated['image'] = null;
        }

        $validated['is_active'] = $request->has('is_active');
        $validated['order'] = $validated['order'] ?? 0;
        
        $gallery->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Gallery item updated successfully!'
        ]);
    }

    public function destroy(Gallery $gallery)
    {
        if ($gallery->image) {
            Storage::disk('public')->delete($gallery->image);
        }
        
        $gallery->delete();

        return response()->json([
            'success' => true,
            'message' => 'Gallery item deleted successfully!'
        ]);
    }

    public function bulkDestroy(Request $request)
    {
        $ids = $request->ids;
        if (!$ids || !is_array($ids)) {
            return response()->json(['success' => false, 'message' => 'No items selected'], 400);
        }

        $galleries = Gallery::whereIn('id', $ids)->get();
        foreach ($galleries as $gallery) {
            if ($gallery->image) {
                Storage::disk('public')->delete($gallery->image);
            }
            $gallery->delete();
        }

        return response()->json([
            'success' => true,
            'message' => count($ids) . ' items deleted successfully!'
        ]);
    }
    
    public function bulkStatus(Request $request)
    {
        $ids = $request->ids;
        $status = $request->status;

        if (!$ids || !is_array($ids)) {
            return response()->json(['success' => false, 'message' => 'No items selected'], 400);
        }

        Gallery::whereIn('id', $ids)->update(['is_active' => $status]);

        return response()->json([
            'success' => true,
            'message' => count($ids) . ' items updated successfully!'
        ]);
    }
}
