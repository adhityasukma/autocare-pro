<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contact = Contact::first();
        return view('admin.contact.index', compact('contact'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'address' => 'nullable|max:255',
            'phone' => 'nullable|max:255',
            'email' => 'nullable|email|max:255',
            'whatsapp' => 'nullable|max:255',
            'map_embed' => 'nullable',
            'facebook' => 'nullable|max:255',
            'instagram' => 'nullable|max:255',
            'twitter' => 'nullable|max:255',
            'youtube' => 'nullable|max:255',
            'working_hours' => 'nullable',
        ]);

        $validated['is_active'] = $request->has('is_active');

        $contact = Contact::first();
        if ($contact) {
            $contact->update($validated);
        } else {
            Contact::create($validated);
        }

        return response()->json([
            'success' => true,
            'message' => 'Contact information updated successfully!'
        ]);
    }
}
