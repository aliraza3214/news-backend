<?php


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
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
        if (!$attributes) {
            return response()->json([
                'email' => 'Invalid Credentials',
            ]);
        } else {
            return response()->json([
                'user' => $user,
                'access_token' => $token,
                'message' => 'user created'
            ]);
        }
    }
}
        // if ($attributes) {
        //     return response()->json([
        //         'user' => $user,
        //         'access_token' => $token,
        //         'message' => 'user created'
        //     ]);
        // } else {
        //     return response()->json([
        //         'email' => 'Invalid Credentials',
        //     ]);
        // }
