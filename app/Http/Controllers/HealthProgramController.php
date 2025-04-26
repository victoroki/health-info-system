<?php

namespace App\Http\Controllers;

use App\Models\HealthProgram;
use Illuminate\Http\Request;

class HealthProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programs = HealthProgram::withCount('clients')
                    ->with('clients') 
                    ->get();
    
        return view('programs.index', compact('programs'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('programs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:20',
            'description' => 'sometimes'
        ]);
        $programs = HealthProgram::create([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return redirect()->route('programs.index')
        ->with('success', 'Program Created!');
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
        public function edit(HealthProgram $program)
        {
            return view('programs.edit', compact('program'));
        }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, HealthProgram $program)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $program->update($validated);
        return redirect()->route('programs.index')->with('success', 'Program updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(HealthProgram $program)
    {
        $program->clients()->detach(); // Remove all client relationships
        $program->delete();
        
        return redirect()->route('programs.index')->with('success', 'Program deleted successfully');
    }
}
