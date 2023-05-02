<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register',[
            'title' => 'Register'
        ] );
    }

    public function store(Request $request){
       $validatedData = $request->validate([
            'name'=> 'required|max:255',
            'email'=> 'required|email:dns|unique:users',
            'password'=> 'required|min:5|max:100'
        ]);

      //  $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);

        return redirect('/login');
    }

}
