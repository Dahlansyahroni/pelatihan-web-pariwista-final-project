<?php

namespace App\Http\Controllers;

use App\Models\Attraction;
use App\Models\Zone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AttractionController extends Controller
{
    public function index()
    {
        $attractions = Attraction::with('zone')->get();
        return view('admin.pages.attractions.index', compact('attractions'));
    }

    public function create()
    {
        $zones = Zone::all();
        return view('admin.pages.attractions.create', compact('zones'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'zone_id' => 'required|exists:zones,id',
            'name' => 'required|string|max:225',
            'description' => 'nullable|string',
            'price' => 'nullable|string|max:225',
            'opening_hours' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'status' => 'required|in:active,inactive',
            'is_featured' => 'boolean',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('attractions', 'public');
        }

        $validated['is_featured'] = $request->has('is_featured');

        Attraction::create($validated);

        return redirect()->route('admin.attractions.index')->with('success', 'Attraction created successfully');
    }

    public function show(Attraction $attraction)
    {
        return view('admin.pages.attractions.show', compact('attraction'));
    }

    public function edit(Attraction $attraction)
    {
        $zones = Zone::all();
        return view('admin.pages.attractions.edit', compact('attraction', 'zones'));
    }

    public function update(Request $request, Attraction $attraction)
    {
        $validated = $request->validate([
            'zone_id' => 'required|exists:zones,id',
            'name' => 'required|string|max:225',
            'description' => 'nullable|string',
            'price' => 'nullable|string|max:225',
            'opening_hours' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'status' => 'required|in:active,inactive',
            'is_featured' => 'boolean',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($attraction->image) {
                Storage::disk('public')->delete($attraction->image);
            }
            $validated['image'] = $request->file('image')->store('attractions', 'public');
        }

        $validated['is_featured'] = $request->has('is_featured');

        $attraction->update($validated);

        return redirect()->route('admin.attractions.index')->with('success', 'Attraction updated successfully');
    }

    public function destroy(Attraction $attraction)
    {
        if ($attraction->image) {
            Storage::disk('public')->delete($attraction->image);
        }

        $attraction->delete();

        return redirect()->route('admin.attractions.index')->with('success', 'Attraction deleted successfully');
    }
}
