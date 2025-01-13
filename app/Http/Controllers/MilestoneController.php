<?php

namespace App\Http\Controllers;

use App\Models\Milestone;
use App\Models\Grant;
use Illuminate\Http\Request;

class MilestoneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $milestones = Milestone::all();
        return view('milestone.index', compact('milestone'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($grant_id)
    {
        $grant = Grant::find($grant_id);
        return view('milestone.create', compact('grant'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255', 
            'target_completionDate' => 'required|date|after_or_equal:today',
            'deliverable' => 'required|string|max:500', 
            'status' => 'nullable|string|max:255',
            'remark' => 'nullable|string|max:1000',
            'dateUpdated' => 'nullable|date',
        ]);

        Milestone::create($request->all());
        $grant = Grant::find($request->grant_id);
        return redirect()->route('grant.show', $grant)->with('success','Milestone created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Milestone $milestone)
    {
        $grant = Grant::find($milestone->grant_id);
        return view('milestone.show', compact('milestone', 'grant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Milestone $milestone)
    {
        $grant = Grant::find($milestone->grant_id);
        return view('milestone.edit', compact('milestone', 'grant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Milestone $milestone)
    {
        $validated = $request->validate([
            'status' => 'nullable|string|max:255',
            'remark' => 'nullable|string|max:1000',
            'dateUpdated' => 'nullable|date',
        ]);

        $milestone->update($validated);
        return redirect()->route('milestone.show', $milestone)->with('success','Milestone updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Milestone $milestone)
    {
        $grant= Grant::find($milestone->grant_id);
        $milestone->delete();
        return redirect()->route('grant.show', compact('grant'))->with('success','Milestone deleted successfully.');
    }
}
