<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $query = Service::query();

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
            $services = $query->get();
        } else {
            $services = $query->paginate((int)$perPage)->withQueryString();
        }

        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'icon' => 'nullable|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'order' => 'nullable|integer',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('services', 'public');
        }

        $validated['is_active'] = $request->has('is_active');
        $validated['order'] = $validated['order'] ?? 0;
        
        Service::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Service created successfully!'
        ]);
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'icon' => 'nullable|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'order' => 'nullable|integer',
        ]);

        if ($request->hasFile('image')) {
            if ($service->image) {
                Storage::disk('public')->delete($service->image);
            }
            $validated['image'] = $request->file('image')->store('services', 'public');
        } elseif ($request->input('remove_image') == '1') {
            if ($service->image) {
                Storage::disk('public')->delete($service->image);
            }
            $validated['image'] = null;
        }

        $validated['is_active'] = $request->has('is_active');
        $validated['order'] = $validated['order'] ?? 0;
        
        $service->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Service updated successfully!'
        ]);
    }

    public function destroy(Service $service)
    {
        if ($service->image) {
            Storage::disk('public')->delete($service->image);
        }
        
        $service->delete();

        return response()->json([
            'success' => true,
            'message' => 'Service deleted successfully!'
        ]);
    }

    public function bulkDestroy(Request $request)
    {
        $ids = $request->ids;
        if (!$ids || !is_array($ids)) {
            return response()->json(['success' => false, 'message' => 'No items selected'], 400);
        }

        $services = Service::whereIn('id', $ids)->get();
        foreach ($services as $service) {
            if ($service->image) {
                Storage::disk('public')->delete($service->image);
            }
            $service->delete();
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

        Service::whereIn('id', $ids)->update(['is_active' => $status]);

        return response()->json([
            'success' => true,
            'message' => count($ids) . ' items updated successfully!'
        ]);
    }
}
