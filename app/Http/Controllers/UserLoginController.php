<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class UserLoginController extends Controller
{
    public function editProfile(){
        return view('user-login.edit-profile', [
            "title" => "editprof",
            "active" => 'editprof'
        ]);
    }
    public function tagihan(){
        return view('user-login.tagihan', [
            "title" => "tagihan",
            "active" => 'tagihan'
        ]);
    }
    public function status(){
        return view('user-login.status', [
            "title" => "status",
            "active" => 'status'
        ]);
    }
    public function sertifikasi(){
        return view('user-login.sertifikasi',[
            "title" => "sertifikasi",
            "active" => 'sertifikasi'
        ]);
    }
    public function beranda(){
        if (!Auth::check()) return redirect()->route('login');
        return view('user-login.beranda',[
            "title" => "beranda"
        ]);
    }
    public function kelus(){
        return view('user-login.kelus',[
            "title" => "kelus",
            "active" => 'kelus'
        ]);
    }
}