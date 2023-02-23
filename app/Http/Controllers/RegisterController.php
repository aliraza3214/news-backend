<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register');
    }
    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required',
        ]);
        $attributes['password'] = bcrypt($attributes['password']);
        $user = User::create($attributes);
        $token = $user->createToken($user->email . '_token')->plainTextToken;
        if ($attributes)
            return response()->json([
                'username' => $user->name,
                'email' => $user->email,
                'access_token' => $token,
                'password' => $user->password,
                'message' => 'user created'
            ]);
        else {
            return response()->json([
                'email' => 'Invalid Credentials',
            ]);
        }

        Auth()->login($user);
        return redirect('/project')->with('success', 'your account created successfully');
    }
}
