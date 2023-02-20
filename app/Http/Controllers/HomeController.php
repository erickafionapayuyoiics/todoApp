<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(User $user)
    {
        $user = Auth::user();
        $tasks = $user->tasks;

        return view('home', compact('tasks'));
    }

    public function showProfile(User $user)
    {
        return view('editprofile');
    }

    public function update(ProfileUpdateRequest $request)
    {
        $user = Auth::user();
        Auth::user()->update($request->getData());
        if ($request->hasFile('image')) {
            $user->clearMediaCollection('profile_image');
            $user->addMediaFromRequest('image')
                ->usingName(Auth::user()->email)
                ->toMediaCollection('profile_image');
        }

        return redirect()->route('home');
    }
}
