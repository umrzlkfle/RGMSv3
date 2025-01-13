<?php

namespace App\Http\Controllers;

use App\Models\Academician;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;


class AcademicianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Gate::allows('admin-access') || Gate::allows('staff-access-grants')) {
            $academicians =  Academician::all();
            return view('academician.index', compact('academicians'));
        }
        abort(403, 'Unauthorized access');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('academician.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'staffNo' => 'required|string|unique:academicians', 
            'email' => 'required|email|unique:academicians',
            'college' => 'required|string|max:255', 
            'department' => 'required|string|max:255', 
            'position' => 'required|string|max:255'
        ]);

        Academician::create($validated);
        return redirect()->route('academician.index')->with('success','Academician created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Academician $academician)
    {
        return view('academician.show', compact('academician'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Academician $academician)
    {
        return view('academician.edit', compact('academician'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Academician $academician)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'staffNo' => 'required|string|unique:academicians', 
            'email' => 'required|string|unique:academicians',
            'college' => 'required|string|max:255', 
            'department' => 'required|string|max:255', 
            'position' => 'required|string|max:255'
        ]);

        $academician->update($validated);
        return redirect()->route('academician.show', $academician)->with('success','Academician updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Academician $academician)
    {
        $academician->delete();
        return redirect()->route('academician.index')->with('success','Academician deleted successfully.');
    }
}
