<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VisitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $visits = \App\Models\Visit::all();
        return view('visit.index', compact('visits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('visit.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'time' => 'required',
            'address' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            //'costumer_id' => 'required|exists:costumers,id',
            'type' => 'required|string|max:100',
            'status' => 'required|string|max:100',
        ]);

        \App\Models\Visit::create($validated);

        return redirect()->route('visits.index')->with('success', 'Visit created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $visit = \App\Models\Visit::findOrFail($id);
        return view('visit.edit', compact('visit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'time' => 'required',
            'address' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            //'costumer_id' => 'required|exists:costumers,id',
            'type' => 'required|string|max:100',
            'status' => 'required|string|max:100',
        ]);
        $visit = \App\Models\Visit::findOrFail($id);
        $visit->update($validated);
        return redirect()->route('visits.index')->with('success', 'Visit updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
