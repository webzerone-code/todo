<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::user();
            $token =  $user->createToken('todo_auth_token')->accessToken;

            return response()->json([
                'access_token' => $token,
                'token_type' => 'Bearer',
                'name' => $user->name,
            ], 200);
        }
        else{
            return response()->json([
                'error'=>'Unauthorised'
            ], 400);
        }
    }
    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        if($validator->fails()){
            return response()->json([
                "error"=>$validator->errors()
            ], 400);
        }

        $user = User::query()->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Create token
        $token = $user->createToken('todo_auth_token')->accessToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'name' => $user->name,
        ], 201);
    }
}
