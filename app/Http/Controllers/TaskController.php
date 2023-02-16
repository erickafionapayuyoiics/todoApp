<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskStoreRequest;
use App\Http\Requests\TaskUpdateRequest;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function showAll()
    {
        $tasks = Task::all();

        return view('admin.tasks', compact('tasks'));
    }

    public function insert(TaskStoreRequest $request)
    {
        Task::create(['title' => $request->title, 'user_id' => Auth::user()->id]);

        return redirect()->route('home');
    }

    public function show(Task $task)
    {
        return view('update', compact('task'));
    }

    public function update(Task $task, TaskUpdateRequest $request)
    {
        $task->update($request->validated());

        return redirect()->route('home');
    }

    public function delete(Task $task)
    {
        $task->delete();

        return redirect()->route('home');
    }
}
