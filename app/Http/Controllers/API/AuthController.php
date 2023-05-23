<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function __construct(){
        $this->middleware('auth:sanctum',['except'=>['register']]);
    }
    public function register(Request $request){
        $validatedData = $request->validate([
            'name'=> 'required|max:255',
            'email'=> 'required|email:dns|unique:users',
            'password'=> 'required|min:5|max:100',
            'role_id' => 'required'
        ]);
      //  $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['password'] = Hash::make($validatedData['password']);
        $user = User::create($validatedData);
        $token = $user->createToken('token-name')->plainTextToken;
        return response()->json([
            'success' => true,
            'user' => $user,
            'token' => $token
        ]);
    }
}
