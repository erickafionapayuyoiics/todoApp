<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function showAll()
    {
        
        $tasks = Task::all();
        return view('admin.tasks', compact('tasks'));
    }


    public function insert(Request $request){
        

        $task = Task::create(['title' => $request->title,  'user_id' => Auth::user()->id ]);

        return redirect()->route('home');
    }

    public function show(Task $task)
    {

        return view('update', compact('task'));
    }

    public function update(Task $task, Request $request){

        $task->update(['title' => $request->title]);


        return redirect()->route('home');
    }

    public function delete(Task $task){

        $task->delete();

        return redirect()->route('home');
    }
}
