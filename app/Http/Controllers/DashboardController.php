<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Models\HealthProgram;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'ClientClass' => Client::class,
            
            'clientModel' => new Client(),
        
            'stats' => [
                'total_clients' => Client::count(),
                'total_programs' => HealthProgram::count(),
                'recent_clients' => Client::with('healthPrograms')
                                      ->latest()
                                      ->take(5)
                                      ->get(),
                'program_distribution' => HealthProgram::withCount('clients')->get()
            ]
        ]);
    }
}
