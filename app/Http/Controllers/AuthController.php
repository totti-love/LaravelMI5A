<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;


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

        return response()->json($success, 200);
    }

    public function login(Request $request)
    {
        if(Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            $user = Auth::user(); //ambil data user dari tabel user
            if($user->role == 'admin'){
                $success['token'] = $user->createToken('MDPApp', ['create', 'read', 'update', 'delete'])->plainTextToken; //buat token
            }else{
                $success['token'] = $user->createToken('MDPApp', [ 'read'])->plainTextToken;
            } 
            $success['name'] = $user->name; //respon nama user
            return response()->json($success, 201);
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }
}
