<?php

namespace App\Http\Controllers;

use App\Models\Factory;
use App\Models\Legalist;
use App\Models\Outlet;
use App\Models\Product;
use App\Models\Responsibler;
use App\Models\Sertification;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use App\Models\Status;

class SertificationController extends Controller
{
    public function addSertifPost(Request $request)
    {
        // dd($request->input('aspect-date')[0]);
        $data = collect(
            [
                'legal' => [
                    'number' =>  $request->input('aspect-doc-number'),
                    'date' => Carbon::now(),
                    'type' => $request->input('aspect-doc'),
                    'agency_name' => $request->input('aspect-agency')
                ],
                'factory' => [
                    'name' => $request->input('factory-name'),
                    'city' => $request->input('factory-city'),
                    'country' => $request->input('factory-country'),
                    'address' => $request->input('factory-address'),
                    'region' => $request->input('factory-region'),
                    'pos' => $request->input('factory-pos')
                ],
                'outlet' => [
                    'name' => $request->input('outlet-name'),
                    'region' => $request->input('outlet-region'),
                    'pos' => 'gada',
                    'address' => $request->input('outlet-address'),
                    'city' => $request->input('outlet-city'),
                    'country' => $request->input('outlet-country')
                ],
                'product' => [
                    'product_name' => $request->input('product-name')
                ]
            ]
        );

        try {
            DB::transaction(function () use ($request) {
                $res = Responsibler::create([
                    'name' => $request->input('responsibler-name'),
                    'email' => $request->input('responsibler-email'),
                    'number' => $request->input('responsibler-telp')
                ]);
                $certification = Sertification::create([
                    'responsibler_id' => $res->id,
                    'status_id' => 1,
                    'id_number' => random_int(1000, 9999),
                    'date' => Carbon::now(),
                    'apply_number' => $request->input('sertif-number'),
                    'service_type' => $request->input('sertif-layanan'),
                    'brand_name' => 'gada',
                    'lph' => $request->input('sertif-lph'),
                    'doc_type' => $request->input('sertif-merek'),
                    'product_type' => $request->input('sertif-jenis-produk'),
                    'install_area' => $request->input('sertif-area')
                ]);
                foreach ($request->input('aspect-doc') as $index => $value) {
                    Legalist::create([
                        'sertification_id' => $certification->id,
                        'number' =>  $request->input('aspect-doc-number')[$index],
                        'date' => $request->input('aspect-date')[$index] ?? Carbon::now(),
                        'type' => $request->input('aspect-doc')[$index],
                        'agency_name' => $request->input('aspect-agency')[$index]
                    ]);
                }
                echo "Done Ga Bang??? DOOON!";
            });
        } catch (QueryException $error) {
            dd($error);
        }
    }

    public function sertifikasi(Request $request)
    {
        $current_status =  $request->query('status');
        $current_search =  $request->query('search');
        $status = Status::all();

        if (isset($current_status)) {
            $sertification = Sertification::with(['status', 'responsibler'])->where('product_type', 'like', '%' . $current_search . '%')->whereRelation('status', 'name', $current_status)->paginate(10)->withQueryString();
        } else {
            $sertification = Sertification::with(['status', 'responsibler'])->where('product_type', 'like', '%' . $current_search . '%')->paginate(10)->withQueryString();
        }
        //dd($sertification);
        return view('user-login.sertifikasi', [
            "title" => "sertifikasi",
            "active" => 'sertifikasi',
            "status" => $status,
            "data" => $sertification,
            "request" => $request
        ]);
    }
    public function updateStatusSertif(Request $request){
        $file = $request->file('file_input');
        $notes = $request->input('notes');
        $number = $request->input('number');
        $update = ['status_id' => $request->status];
        //dd($file->getClientOriginalExtension());
        if(isset($file)){
            $filetype = $request->input('file_type');
            $filename = Str::random(10).".".$file->getClientOriginalExtension();
            $file->storePubliclyAs($filetype, $filename, "public");
            Document::create([
                "sertification_id" => $request->id,
                "name" => $filename,
                "type" => $filetype
            ]);
        }
        //dd($notes);
        if(isset($notes)){
            $update = array_merge($update, ['notes' => $notes]);
        }
        if(isset($number)){
            $update = array_merge($update, ['bills' => $number]);
        }
        Sertification::where('id', $request->id)->update($update);
        return redirect()->back();
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
}
