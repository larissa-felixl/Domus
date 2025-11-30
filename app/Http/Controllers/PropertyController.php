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
        $categories = \App\Models\Category::all();
        return view('properties.create', compact('categories'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'adress' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'type' => 'required|string|max:100',
            'status' => 'required|string|max:100',
            'category_id' => 'nullable|exists:categories,id',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'owner_name' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('picture') && $request->file('picture')->isValid()) {
            $validated['picture'] = $request->file('picture')->store('properties', 'public');
        }

        Property::create($validated);

        return redirect()->route('properties.index')->with('success', 'Property created successfully.');
    }


    public function show(Property $property)
    {
        return view('properties.show', compact('property'));
    }

   
    public function edit(Property $property)
    {
        $categories = \App\Models\Category::all();
        return view('properties.edit', compact('property', 'categories'));
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
            'category_id' => 'nullable|exists:categories,id',
            'owner_name' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('picture')) {
            $validated['picture'] = $request->file('picture')->store('properties', 'public');
        }

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
