<?php

namespace App\Http\Controllers;

use App\Models\Academician;
use App\Models\Grant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class GrantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Gate::allows('admin-access') || Gate::allows('staff-access-grants')) {
            $grants = Grant::all();
            return view('grant.index', compact('grants'));
        }
        abort(403, 'Unauthorized access');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        // Only allow admins to create grants
        if (Gate::denies('admin-access')) {
            abort(403, 'Unauthorized access');
        }

        
        $academicians = Academician::all(); // Fetch all subjects to populate the dropdown
        //$grant->load('academicians'); // Eager-load subjects
        return view('grant.create', compact('academicians'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'grantAmount' => 'required|numeric|min:0',
            'grantProvider' => 'required|string|max:255',
            'projectTitle' => 'required|string|max:255|unique:grants',
            'startDate' => 'required|date',
            'durationMonth' => 'required|integer|min:1',
            'projectLeader' => 'required|exists:academicians,id',
        ]);
        
        $grant = Grant::create($validated);
        $grant->academicians()->attach($request->projectLeader, ['role' => 'leader']);
        return redirect()->route('grant.index')->with('success','Research Grant created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Grant $grant)
    {
        // Eager load subjects for the student
        $grant->load('academicians'); // Eager-load subjects
        $academicians = Academician::all(); // Fetch all subjects to populate the dropdown
        return view('grant.show', compact('grant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Grant $grant)
    {
        return view('grant.edit', compact('grant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Grant $grant)
    {
        $validated = $request->validate([
            'grantAmount' => 'required|numeric|min:0',
            'grantProvider' => 'required|string|max:255',
            'projectTitle' => 'required|string|max:255|unique:grants',
            'startDate' => 'required|date',
            'durationMonth' => 'required|integer|min:1',
        ]);
        $grant->update($validated);
        return redirect()->route('grant.show', $grant)->with('success','Grant updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Grant $grant)
    {
        $grant->delete();
        return redirect()->route('grant.index')->with('success','Grant deleted successfully.');
    }

    public function removeMember(Grant $grant, Academician $academician)
    {
        // Check if the member is part of the grant
        if (!$grant->academicians()->where('academician_id', $academician->id)->exists()) {
            return redirect()->back()->with('error', 'This member is not part of the project.');
        }
    
        // Detach the member
        $grant->academicians()->detach($academician->id);
    
        return redirect()->back()->with('success', 'Member removed successfully.');
    }

    public function selectMember(Grant $grant)
    {
        $grant->load('academicians'); // Eager-load subjects
        $academicians = Academician::all(); // Fetch all subjects to populate the dropdown
        return view('grant.addMember', compact('grant', 'academicians'));
    }

    public function addMember(Request $request, Grant $grant)
    {
        $request->validate([
            'academician_id' => 'required|exists:academicians,id',
            'role' => 'required|string',
        ]);

        // Check if the member is already associated with the grant
        if ($grant->academicians()->where('academician_id', $request->academician_id)->exists()) {
            return redirect()->back()->with('error', 'This member is already part of the project.');
        }

        // Attach the member with the role
        $grant->academicians()->attach($request->academician_id, ['role' => $request->role]);

        return redirect()->route('grant.index')->with('success', 'Member added successfully.');
    }

}
