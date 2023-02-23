<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\User;

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

        if (auth()->attempt($attributes)) {
            $user = User::where('email', request()->email)->first();
            $token = $user->createToken($user->email . '_token')->plainTextToken;
            return response()->json([
                'user' => $user,
                'access_token' => $token,
                'message' => 'Welcome Back',
            ]);
        } else {
            return response()->json([
                'message' => 'Invalid password',
            ], 422);
        }
    }

    //        if (!auth()->attempt($attributes)) {
    //            throw  ValidationException::withMessages([
    //                'email' => 'Invalid Credentials',
    //            ]);
    //        }
    //        else
    //        session()->regenerate();
    //        return redirect('/project')->with('success','Welcome back');

    //
    //        if(auth()->attempt($attribute)) {
    //            return redirect('/project');
    //        }

    public function destroy()
    {
        auth()->logout();
        return redirect('/')->with('success', 'Logout successfully');
    }
}
