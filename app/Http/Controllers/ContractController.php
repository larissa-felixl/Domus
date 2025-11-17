<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contracts = \App\Models\Contract::all();
        return view('contracts.index', compact('contracts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contracts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'file' => 'required|file|mimes:pdf,doc,docx|max:10240', // 10MB max
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'value' => 'required|numeric|min:0',
            'type' => 'required|string|max:100',
            'status' => 'required|string|max:100',
            'description' => 'nullable|string|max:500',
        ]);

        // Salvar o arquivo no storage/app/public/contracts
        $filePath = $request->file('file')->store('contracts', 'public');

        // Criar o contrato com o caminho do arquivo
        \App\Models\Contract::create([
            'title' => $validated['title'],
            'file' => $filePath, // Salva o caminho do arquivo
            'start_date' => $validated['start_date'],
            'end_date' => $validated['end_date'] ?? null,
            'value' => $validated['value'],
            'type' => $validated['type'],
            'status' => $validated['status'],
            'description' => $validated['description'] ?? null,
        ]);

        return redirect()->route('contracts.index')->with('success', 'Contract created successfully.');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
