<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Middleware\AuthAdmin;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    //

    public function login(Request $request)
    {
        if (! Auth::guard('admin')->attempt($request->only('email', 'password'), $request->filled('remember'))) {
            throw ValidationException::withMessages([
                'email' => 'Invalid email or password',
            ]);
        }

        return redirect()->route('admin.home');
    }

    public function showLoginForm()
    {
        return view('admin.login');
    }
}
