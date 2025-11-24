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
        
        return view('dashboard', compact('visits'));
    }
}
