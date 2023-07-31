<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Status;
use App\Models\Sertification;

class UserLoginController extends Controller
{
    public function beranda()
    {
        if (!Auth::check()) return redirect()->route('login');
        $status = Status::all();
        return view('user-login.beranda', [
            "title" => "beranda",
            "status" => $status,
        ]);
    }
    public function help()
    {
        return view('users.help', [
            "title" => "help",
            "active" => 'help',
        ]);
    }
}
