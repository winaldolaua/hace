<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Status;
use App\Models\Sertification;
class UserLoginController extends Controller
{
    public function beranda(){
        if (!Auth::check()) return redirect()->route('login');
        return view('user-login.beranda',[
            "title" => "beranda",
        ]);
    }
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
    public function sertifikasi(Request $request){
        $current_status =  $request->query('status');
        $current_search =  $request->query('search');
        $status = Status::all();

        if (isset($current_status)) {
            $sertification = Sertification::with(['status', 'responsibler'])->where('product_type', 'like', '%'.$current_search.'%')->whereRelation('status', 'name', $current_status)->get();
        } else {
            $sertification = Sertification::with(['status', 'responsibler'])->where('product_type', 'like', '%'.$current_search.'%')->get();
        }
        return view('user-login.sertifikasi',[
            "title" => "sertifikasi",
            "active" => 'sertifikasi',
            "status" => $status,
            "data" => $sertification,
            "request" => $request
        ]);
    }
    public function addSertif()
    {
        $list_file = collect([
            [
                "name" => "surat-permohonan",
                "title" => 'Surat Permohonan'
            ],
            [
                "name" => "formulir-pendaftaran",
                "title" => 'Formulir Pendaftaran'
            ],
            [
                "name" => "aspek-legal",
                "title" => 'Aspek Legal'
            ],
            [
                "name" => "penyelia-halal",
                "title" => 'Dokumen Penyelia Halal '
            ],
            [
                "name" => "daftar-produk",
                "title" => 'Daftar Nama Produk dan Bahan/Menu/Barang'
            ],
            [
                "name" => "proses-pengolahan",
                "title" => 'Proses Pengolahan Produk'
            ],
            [
                "name" => "jaminan-halal",
                "title" => 'Sistem Jaminan Halal'
            ],
            [
                "name" => "salinan-sertif",
                "title" => 'Salinan Sertifikat Halal (Bagi Pembaruan)'
            ],
            [
                "name" => "lainnya",
                "title" => 'Lainnya'
            ],
        ]);
        return view('user-login.add-sertifikasi', [
            "title" => "Tambah Sertifikasi",
            "active" => 'sertifikasi',
            "list_file" => $list_file,
        ]);
    }
    public function kelus(){
        return view('user-login.kelus',[
            "title" => "kelus",
            "active" => 'kelus'
        ]);
    }
}
