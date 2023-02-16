<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Models\User;
use App\Models\Task;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;


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

    public function insert(UserStoreRequest $request)
    {
        User::create($request->getData());
        return redirect()->route('admin.users');
 
    }

    public function showUser(User $user)
    {

        return view('admin.edituser', compact('user'));
    }

    public function showTasks(User $user)
    {
        $tasks = $user->tasks;
        
        return view('admin.usertask', compact('user', 'tasks'));
    }

    public function update(User $user, UserUpdateRequest $request){

        $user->update($request->validated());


        return redirect()->route('admin.users');
    }

    public function delete(User $user){

        $user->delete();

        return redirect()->route('admin.users');
    }
}
