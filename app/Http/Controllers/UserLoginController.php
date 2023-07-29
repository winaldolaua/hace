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
    public function sertifikasi(Request $request)
    {
        $current_status =  $request->query('status');
        $status = Status::all();
        if (isset($current_status)) {
            $sertification = Sertification::with(['status', 'responsibler'])->whereRelation('status', 'name', $current_status)->get();
        } else {
            $sertification = Sertification::with(['status', 'responsibler'])->get();
        }
        return view('user-login.sertifikasi', [
            "title" => "sertifikasi",
            "active" => 'sertifikasi',
            "status" => $status,
            "data" => $sertification,
            "current_status" => $current_status,
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
