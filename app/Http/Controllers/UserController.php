<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            return response('The provided credentials are incorrect.', 202);
        }

        $token = $user->createToken('Token')->plainTextToken;

        return response([
            'token' => $token,
            'user' => new UserResource($user)
        ]);
    }

    public function signup(UserRequest $request)
    {
        User::create($request->all());

        return response('User created Successfully');
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response('Logout successfull');
    }

    public function user(Request $request)
    {
        return new UserResource($request->user());
    }

    public function search(Request $request)
    {
        if ($request->firstName && $request->lastName) {
            $user = User::where('firstName', 'LIKE', '%' . $request->firstName . '%')
                ->orWhere('lastName', 'LIKE', '%' . $request->lastName . '%')
                ->get();
        } elseif ($request->firstName) {
            $user = User::where('firstName', 'LIKE', '%' . $request->firstName . '%')
                ->get();
        } elseif ($request->lastName) {
            $user = User::where('lastName', 'LIKE', '%' . $request->lastName . '%')
                ->get();
        } else {
            $user = User::all();
        }

        return UserResource::collection($user);
    }
}
