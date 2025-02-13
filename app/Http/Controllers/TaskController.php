<?php

namespace App\Http\Controllers;

use App\Models\Milestone;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

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
                    "start" => '2025-02-16',
                    "end" => '2025-02-19',
                    "progress" => $item->progress,
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
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
    }
}
