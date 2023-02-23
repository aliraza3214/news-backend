<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{

    public function create()
    {
        return view('login');
    }


    public function store()
    {

        $attributes = request()->validate([
            'email' => 'required|exists:users,email',
            'password' => 'required',
        ]);
        if (!auth()->attempt($attributes)) {
            throw  ValidationException::withMessages([
                'email' => 'Invalid Credentials',
            ]);
        }
        if (auth()->attempt($attributes)) {
            return redirect('/project');
        }
        session()->regenerate();
        return redirect('/project')->with('success', 'Welcome back');
    }
        function destroy()
        {
            auth()->logout();
            return redirect('/')->with('success', 'Logout successfully');
        }

}
