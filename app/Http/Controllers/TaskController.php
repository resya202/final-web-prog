<?php

namespace App\Http\Controllers;

use App\Models\Milestone;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::get()
            ->map(function($item) {
                return [
                    "id" => $item->id,
                    "name" => $item->name,
                    "start" => $item->start_date->format('Y-m-d'),
                    "end" => $item->end_date->format('Y-m-d'),
                    "progress" => $item->progress,
                    "detail_url" => route("task.edit", $item->id)
                ];
            });
        return view('task.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $task = new Task();
        $milestone_options = Milestone::pluck('name', 'id');
        $assigned_options = User::pluck('name', 'id');
        return view('task.create', compact('task','milestone_options','assigned_options'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required'],
            'status' => ['required'],
            'assigned_to' => ['nullable'],
            'milestone_id' => ['nullable'],
            'start_date' => ['required'],
            'end_date' => ['required'],
        ]);
        $task = new Task;
        $task->fill($validated);
        $task->save();
        Session::flash("success", "Task \"$task->name\" sucessfully added");
        return redirect()->route("task.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        $milestone_options = Milestone::pluck('name', 'id');
        $assigned_options = User::pluck('name', 'id');
        return view("task.edit", compact('task','milestone_options','assigned_options'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'name' => ['required'],
            'status' => ['required'],
            'assigned_to' => ['nullable'],
            'milestone_id' => ['nullable'],
            'start_date' => ['required','date_format:d-m-Y'],
            'end_date' => ['required','date_format:d-m-Y'],
        ]);
        $task->fill($validated);
        $task->save();

        Session::flash("success", "Task: <b>$task->name</b> sucessfully updated");
        return redirect()->route("task.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();

        Session::flash("success", "Task: <b>$task->name</b> sucessfully deleted");
        return redirect()->route("task.index");
    }
}
