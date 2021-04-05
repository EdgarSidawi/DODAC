<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $data = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('username', $request->username)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response('The provided credentials are incorrect.');
        }

        $token = $user->createToken('Token')->plainTextToken;

        return response([
            'token' => $token,
            'user' => $user
        ]);
    }

    public function signup(Request $request)
    {
        $password = Hash::make($request->password);
        $request->password = $password;
        // return $request->password;
        User::create($request->all());

        return response('User created Successfully');
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return ('Logout successfull');
    }
}
