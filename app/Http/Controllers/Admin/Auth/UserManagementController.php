<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Models\User;
use App\Models\Task;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserManagementController extends Controller
{
    public function showAll()
    {
        
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function showAdduser()
    {
        
        return view('admin.adduser');
    }

    public function insert(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.users');
    }

    public function showUser(User $user)
    {

        return view('admin.edituser', compact('user'));
    }

    public function showTasks(User $user)
    {
        $tasks = Task::whereUserId($user->id)->get();
        
        return view('admin.usertask', compact('user', 'tasks'));
    }

    public function update(User $user, Request $request){

        $user->update(['name' => $request->name, 'email' => $request->email]);


        return redirect()->route('admin.users');
    }

    public function delete(User $user){

        $user->delete();

        return redirect()->route('admin.users');
    }
}
