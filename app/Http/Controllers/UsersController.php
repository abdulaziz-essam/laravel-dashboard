<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UsersController extends Controller{
    public function login(Request $request)
    {
        $credentials = $request->only('name', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication successful
            $user = Auth::user();
            return response()->json(['message' => 'Login successful', 'user' => $user, 'status' => 200]);
        } else {
            // Authentication failed
            return response()->json(['message' => 'Invalid email or password', 'status' => 401]);
        }
    }
    public function status (){
        if (auth()->check()) {
            // User is logged in
            return response()->json(['loggedIn' => true, 'session'=>Auth::user()]);
        } else {
            // User is not logged in
            return response()->json(['loggedIn' => false ,'session'=>Auth::user()]);
        }
    }

}
