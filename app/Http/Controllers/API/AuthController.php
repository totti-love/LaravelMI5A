<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validate = $request->validate([
            'name'  => 'required',
            'email' => 'required|email',
            'password'  => 'required',
            'password_confirmation' => 'required|same:password'
        ]);

        $validate['password'] = bcrypt($request->password);

        $user = User::create($validate);
        $success['token'] = $user->createToken('MDPApp')->plainTextToken;
        $success['name'] = $user->name;

        return response()->json($success, Response::HTTP_CREATED);
    }
}
