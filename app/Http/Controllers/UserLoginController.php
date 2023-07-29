<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Status;

class UserLoginController extends Controller
{
    public function beranda()
    {
        if (!Auth::check()) return redirect()->route('login');
        return view('user-login.beranda', [
            "title" => "beranda",
        ]);
    }
    public function editProfile()
    {
        return view('user-login.edit-profile', [
            "title" => "editprof",
            "active" => 'editprof'
        ]);
    }
    public function tagihan()
    {
        return view('user-login.tagihan', [
            "title" => "tagihan",
            "active" => 'tagihan'
        ]);
    }
    public function status()
    {
        return view('user-login.status', [
            "title" => "status",
            "active" => 'status'
        ]);
    }
    public function sertifikasi()
    {
        $status = Status::all();
        return view('user-login.sertifikasi', [
            "title" => "sertifikasi",
            "active" => 'sertifikasi',
            "status" => $status
        ]);
    }
    public function addSertif()
    {
        return view('user-login.add-sertifikasi', [
            "title" => "Tambah Sertifikasi",
            "active" => 'sertifikasi'
        ]);
    }
    public function kelus()
    {
        return view('user-login.kelus', [
            "title" => "kelus",
            "active" => 'kelus'
        ]);
    }
}
