<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display the dashboard view.
     */
    public function index()
    {
        $today = now()->format('Y-m-d');
        
        // Buscar visitas de hoje
        $visits = \App\Models\Visit::whereDate('date', $today)
                                    ->orderBy('time')
                                    ->get();

        $propertiesCount = \App\Models\Property::count();
        $costumersCount = \App\Models\Costumer::count();
        $contractsCount = \App\Models\Contract::count();
        
        return view('dashboard', compact('visits', 'propertiesCount', 'costumersCount', 'contractsCount'));
    }
}
