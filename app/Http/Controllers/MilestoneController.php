<?php

namespace App\Http\Controllers;

use App\Models\Milestone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MilestoneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $milestones = Milestone::get();
        $gantt_milestones = $milestones
            ->map(function($item) {
                return [
                    "id" => $item->id,
                    "name" => $item->name,
                    "start" => '2025-02-16',
                    "end" => '2025-02-19',
                    "progress" => $item->progress,
                ];
            });
        return view('milestone.index', compact('milestones','gantt_milestones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $milestone = new Milestone();
        return view('milestone.create', compact('milestone'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required','string'],
            'start_date' => ['nullable'],
            'end_date' => ['nullable'],
        ]);

        $milestone = new Milestone();
        $milestone->fill($validated);
        $milestone->save();
        Session::flash('success', "New Milestone <b>\"$milestone->name\"</b> has created");
        return redirect()->route('milestone.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Milestone $milestone)
    {
        $tasks = $milestone->tasks()->latest()->get();
        return view('milestone.detail', compact('milestone','tasks'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Milestone $milestone)
    {
        return view('milestone.edit', compact('milestone'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Milestone $milestone)
    {
        $validated = $request->validate([
            'name' => ['required','string'],
            'start_date' => ['nullable'],
            'end_date' => ['nullable'],
        ]);
        $milestone->fill($validated);
        $milestone->save();
        Session::flash('success', "Milestone <b>\"$milestone->name\"</b> has updated");
        return redirect()->route('milestone.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Milestone $milestone)
    {
        $milestone->delete();
        Session::flash('success', "Milestone <b>\"$milestone->name\"</b> succesfully deleted");
        return redirect()->route("milestone.index");
    }
}
