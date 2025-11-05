<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;

class PropertyController extends Controller
{
    
    public function index()
    {
        $properties = Property::orderBy('created_at', 'desc')->get();
        return view('properties.index', compact('properties'));
    }

    public function create()
    {
        return view ('properties.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'adress' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'type' => 'required|string|max:100',
            'status' => 'required|string|max:100',
            'owner_name' => 'nullable|string|max:255',
        ]);

        Property::create($validated);

        return redirect()->route('properties.index')->with('success', 'Property created successfully.');
    }


    public function show(Property $property)
    {
        return view('properties.show', compact('property'));
    }

   
    public function edit(Property $property)
    {
        return view('properties.edit', compact('property'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Property $property)
    {
        $validated = $request->validate([
            'adress' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'type' => 'required|string|max:100',
            'status' => 'required|string|max:100',
            'owner_name' => 'nullable|string|max:255',
        ]);

        $property->update($validated);
        return redirect()->route('properties.index')->with('success', 'Property updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        $property->delete();
        return redirect()->route('properties.index')->with('success', 'Property deleted successfully.');
    }
}
