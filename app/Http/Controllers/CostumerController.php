<?php

namespace App\Http\Controllers;

use App\Models\Costumer;
use Illuminate\Http\Request;

class CostumerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $costumers = Costumer::with('contractsList')->orderBy('created_at', 'desc')->get();
        return view('costumers.index', compact('costumers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('costumers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'type' => 'required|string|max:100',
            'status' => 'required|string|max:100',
            'picture' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp|max:5120',
        ]);

        // Upload da imagem
        if ($request->hasFile('picture')) {
            $validated['picture'] = $request->file('picture')->store('costumers', 'public');
        }

        Costumer::create($validated);

        return redirect()->route('costumers.index')->with('success', 'Costumer created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $costumer = Costumer::with('contractsList')->findOrFail($id);
        return view('costumers.show', compact('costumer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $costumer = Costumer::findOrFail($id);
        return view('costumers.edit', compact('costumer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $costumer = Costumer::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'type' => 'required|string|max:100',
            'status' => 'required|string|max:100',
            'picture' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp|max:5120',
        ]);

        // Upload de nova imagem
        if ($request->hasFile('picture')) {
            // Deletar imagem antiga
            if ($costumer->picture && \Storage::disk('public')->exists($costumer->picture)) {
                \Storage::disk('public')->delete($costumer->picture);
            }
            
            $validated['picture'] = $request->file('picture')->store('costumers', 'public');
        }

        $costumer->update($validated);
        return redirect()->route('costumers.index')->with('success', 'Costumer updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $costumer = Costumer::findOrFail($id);
        
        // Deletar imagem do storage
        if ($costumer->picture && \Storage::disk('public')->exists($costumer->picture)) {
            \Storage::disk('public')->delete($costumer->picture);
        }
        
        $costumer->delete();
        return redirect()->route('costumers.index')->with('success', 'Costumer deleted successfully.');
    }
}
