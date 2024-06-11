<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index',compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        //Validate
        $request->validate([
            'title' => 'required|min:3',
            'description' => 'required',
        ]);

        $task = Task::create(['title' => $request->title,'description' => $request->description]);
        return redirect('/tasks/'.$task->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return view('tasks.show',compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return view('tasks.edit',compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
         //Validate
        $request->validate([
            'title' => 'required|min:3',
            'description' => 'required',
        ]);

        $task->title = $request->title;
        $task->description = $request->description;
        $task->save();
        $request->session()->flash('message', 'Successfully modified the task!');
        return redirect('tasks');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UpdateTaskRequest $request, Task $task)
    {
        $task->delete();
        $request->session()->flash('message', 'Successfully deleted the task!');
        return redirect('tasks');
    }
}
