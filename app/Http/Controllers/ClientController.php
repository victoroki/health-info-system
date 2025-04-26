<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Models\HealthProgram;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Client::with('healthPrograms')
                    ->withCount('healthPrograms');
    
        if ($search = request('search')) {
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }
    
        $clients = $query->paginate(10); // Changed from get() to paginate()
    
        return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $programs = HealthProgram::all();
        return view('clients.create', compact('programs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:clients',
            'dob' => 'required|date',
            'phone' => 'required',
        ]);

        $client = Client::create($request->all());
        $client->healthPrograms()->attach($request->programs);

        return redirect()->route('clients.index')->with('success', 'Client created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        // Eager load health programs with enrollment dates
        $client->load(['healthPrograms' => function ($query) {
            $query->withPivot('enrollment_date');
        }]);
    
        return view('clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        $programs = HealthProgram::all();
        return view('clients.edit', compact('client', 'programs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:clients,email,'.$client->id,
            'dob' => 'required|date',
            'phone' => 'required',
        ]);
    
        $client->update($validated);
        
        // Sync programs (handles additions and removals)
        $client->healthPrograms()->sync($request->programs ?? []);
    
        return redirect()->route('clients.index')->with('success', 'Client updated successfully');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        $client->healthPrograms()->detach(); // Remove program relationships
        $client->delete();
        
        return redirect()->route('clients.index')->with('success', 'Client deleted successfully');
    }


    public function attachProgram(Request $request, Client $client)
    {
        $request->validate([
            'program_id' => 'required|exists:health_programs,id'
        ]);

        // Check if already enrolled
        if ($client->healthPrograms()->where('health_program_id', $request->program_id)->exists()) {
            return back()->with('error', 'Client is already enrolled in this program');
        }

        $client->healthPrograms()->attach($request->program_id, [
            'enrollment_date' => now()
        ]);

        return back()->with('success', 'Client enrolled in program successfully');
    }

/**
 * Detach a health program from a client
 */
    public function detachProgram(Client $client, HealthProgram $program)
    {
        $client->healthPrograms()->detach($program->id);
        return back()->with('success', 'Client removed from program');
    }


}

