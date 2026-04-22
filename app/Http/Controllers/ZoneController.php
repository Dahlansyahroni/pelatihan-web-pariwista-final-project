<?php

namespace App\Http\Controllers;

use App\Models\Zone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ZoneController extends Controller
{
    public function index()
    {
        $zones = Zone::all();
        return view('admin.pages.zones.index', compact('zones'));
    }

    public function create()
    {
        return view('admin.pages.zones.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:225',
            'description' => 'nullable|string',
            'price_range' => 'required|string|max:225',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('zones', 'public');
        }

        Zone::create($validated);

        return redirect()->route('admin.zones.index')->with('success', 'Zone created successfully');
    }

    public function show(Zone $zone)
    {
        $zone->load('attractions');
        return view('admin.pages.zones.show', compact('zone'));
    }

    public function edit(Zone $zone)
    {
        return view('admin.pages.zones.edit', compact('zone'));
    }

    public function update(Request $request, Zone $zone)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:225',
            'description' => 'nullable|string',
            'price_range' => 'required|string|max:225',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($zone->image) {
                Storage::disk('public')->delete($zone->image);
            }
            $validated['image'] = $request->file('image')->store('zones', 'public');
        }

        $zone->update($validated);

        return redirect()->route('admin.zones.index')->with('success', 'Zone updated successfully');
    }

    public function destroy(Zone $zone)
    {
        if ($zone->image) {
            Storage::disk('public')->delete($zone->image);
        }

        $zone->delete();

        return redirect()->route('admin.zones.index')->with('success', 'Zone deleted successfully');
    }
}
