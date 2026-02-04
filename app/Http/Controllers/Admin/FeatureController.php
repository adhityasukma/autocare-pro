<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    public function index(Request $request)
    {
        $query = Feature::query();

        // Search
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Ordering
        $query->orderBy('order', 'asc')->orderBy('created_at', 'desc');

        // Pagination
        $perPage = $request->input('per_page', 10);
        if ($perPage == 'all') {
            $features = $query->get();
        } else {
            $features = $query->paginate((int)$perPage)->withQueryString();
        }

        return view('admin.features.index', compact('features'));
    }

    public function create()
    {
        return view('admin.features.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'icon' => 'nullable|max:255',
            'order' => 'nullable|integer',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $validated['order'] = $validated['order'] ?? 0;
        
        Feature::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Feature created successfully!'
        ]);
    }

    public function edit(Feature $feature)
    {
        return view('admin.features.edit', compact('feature'));
    }

    public function update(Request $request, Feature $feature)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'icon' => 'nullable|max:255',
            'order' => 'nullable|integer',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $validated['order'] = $validated['order'] ?? 0;
        
        $feature->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Feature updated successfully!'
        ]);
    }

    public function destroy(Feature $feature)
    {
        $feature->delete();

        return response()->json([
            'success' => true,
            'message' => 'Feature deleted successfully!'
        ]);
    }

    public function bulkDestroy(Request $request)
    {
        $ids = $request->ids;
        if (!$ids || !is_array($ids)) {
            return response()->json(['success' => false, 'message' => 'No items selected'], 400);
        }

        Feature::whereIn('id', $ids)->delete();

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

        Feature::whereIn('id', $ids)->update(['is_active' => $status]);

        return response()->json([
            'success' => true,
            'message' => count($ids) . ' items updated successfully!'
        ]);
    }
}
