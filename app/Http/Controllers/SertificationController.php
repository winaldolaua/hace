<?php

namespace App\Http\Controllers;

use App\Models\Factory;
use App\Models\Legalist;
use App\Models\Register;
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
    public function addSertifPost(Request $request, $id_number = 0)
    {
        $list_file = ["nib", "surat-permohonan", "formulir-pendaftaran", "aspek-legal", "penyelia-halal", "daftar-produk", "proses-pengolahan", "jaminan-halal", "salinan-sertif", "lainnya"];

        // $validated = $request->validate([
        //     'title' => 'required|unique:posts|max:255',
        //     'body' => 'required',
        // ]);
        $data = Sertification::where("id_number", $id_number)->first();
        $validate_sertif = $request->validate([
            // register
            'reg-name' => 'required|min:3',
            'reg-address' => 'required',
            'reg-business-type' => 'required',
            'reg-business-scale' => 'required',
            // sertif
            'sertif-number' => 'required|size:13',
            'sertif-layanan' => 'required',
            'sertif-jenis-produk' => 'required',
            'sertif-merek' => 'required',
            'sertif-area' => 'required',
            'sertif-lph' => 'required',
            'sertif-tgl-surat-permohonan' => 'required',
            // // responsibler
            'responsibler-name' => 'required|min:3',
            'responsibler-email' => 'required|email:dns',
            'responsibler-telp' => 'required|min:11|numeric',
            // legal-aspect
            'aspect-doc-number.*' => 'required',
            'aspect-agency.*' => 'required',
            'aspect-date.*' => 'required',
            'aspect-doc.*' => 'required',
            // Factory
            'factory-name.*' => 'required',
            'factory-address.*' => 'required',
            'factory-city.*' => 'required',
            'factory-region.*' => 'required',
            'factory-country.*' => 'required',
            'factory-pos.*' => 'required',
            // Outlet
            'outlet-name.*' => 'required',
            'outlet-address.*' => 'required',
            'outlet-city.*' => 'required',
            'outlet-region.*' => 'required',
            'outlet-country.*' => 'required',
            // product
            'product-name.*' => 'required|min:3',

        ]);
        // dd($data);
        try {
            DB::transaction(function () use ($request, $list_file, $data) {
                $res = Responsibler::updateOrCreate(
                    [
                        'id' => isset($data) ? $data->responsibler_id : null
                    ],
                    [
                        'name' => $request->input('responsibler-name'),
                        'email' => $request->input('responsibler-email'),
                        'number' => $request->input('responsibler-telp')
                    ]
                );
                $reg = Register::updateOrCreate(
                    [
                        'id' => isset($data) ? $data->register_id : null
                    ],
                    [
                        'name' => $request->input('reg-name'),
                        'address' => $request->input('reg-address'),
                        'business_type' => $request->input('reg-business-type'),
                        'business_scale' => $request->input('reg-business-type'),
                    ]
                );
                $certification = Sertification::updateOrCreate(
                    [
                        'id' => isset($data) ? $data->id : null
                    ],
                    [
                        'responsibler_id' => $res->id,
                        'register_id' => $reg->id,
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
                    ]
                );
                Legalist::where('sertification_id', $certification->id)->delete();
                foreach ($request->input('aspect-doc') as $index => $value) {
                    Legalist::create([
                        'sertification_id' => $certification->id,
                        'number' =>  $request->input('aspect-doc-number')[$index],
                        'date' => $request->input('aspect-date')[$index] ?? Carbon::now(),
                        'type' => $request->input('aspect-doc')[$index],
                        'agency_name' => $request->input('aspect-agency')[$index]
                    ]);
                }
                Factory::where('sertification_id', $certification->id)->delete();
                foreach ($request->input('factory-name') as $index => $value) {
                    Factory::create([
                        'sertification_id' => $certification->id,
                        'name' => $request->input('factory-name')[$index],
                        'city' => $request->input('factory-city')[$index],
                        'country' => $request->input('factory-country')[$index],
                        'address' => $request->input('factory-address')[$index],
                        'region' => $request->input('factory-region')[$index],
                        'pos' => $request->input('factory-pos')[$index]
                    ]);
                }
                Outlet::where('sertification_id', $certification->id)->delete();
                foreach ($request->input('outlet-name') as $index => $value) {
                    Outlet::create([
                        'sertification_id' => $certification->id,
                        'name' => $request->input('outlet-name')[$index],
                        'region' => $request->input('outlet-region')[$index],
                        'pos' => 'gada',
                        'address' => $request->input('outlet-address')[$index],
                        'city' => $request->input('outlet-city')[$index],
                        'country' => $request->input('outlet-country')[$index]
                    ]);
                }
                Product::where('sertification_id', $certification->id)->delete();
                foreach ($request->input('product-name') as $index => $value) {
                    Product::create([
                        'sertification_id' => $certification->id,
                        'product_name' => $request->input('product-name')[$index],
                    ]);
                }
                Document::where('sertification_id', $certification->id)->delete();
                foreach ($list_file as $index => $filetype) {
                    $file = $request->file('file' . $index);
                    if (isset($file)) {
                        $filename = Str::random(10) . "." . $file->getClientOriginalExtension();
                        $file->storePubliclyAs($filetype, $filename, "public");
                        Document::create([
                            "sertification_id" => $certification->id,
                            "name" => $filename,
                            "type" => $filetype
                        ]);
                    }
                }
            });
            return redirect()->to('/sertifikasi')->with('success', 'Sertifikasi Berhasil Dikirim');
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
    public function updateStatusSertif(Request $request)
    {
        $file = $request->file('file_input');
        $notes = $request->input('notes');
        $number = $request->input('number');
        $update = ['status_id' => $request->status];
        //dd($file->getClientOriginalExtension());
        if (isset($file)) {
            $filetype = $request->input('file_type');
            $filename = Str::random(10) . "." . $file->getClientOriginalExtension();
            $file->storePubliclyAs($filetype, $filename, "public");
            Document::create([
                "sertification_id" => $request->id,
                "name" => $filename,
                "type" => $filetype
            ]);
        }
        //dd($notes);
        if (isset($notes)) {
            $update = array_merge($update, ['notes' => $notes]);
        }
        if (isset($number)) {
            $update = array_merge($update, ['bills' => $number]);
        }
        Sertification::where('id', $request->id)->update($update);
        return redirect()->back();
    }
    public function addSertif($id_number = false)
    {
        // dd(now());

        $list_file = collect([
            [
                "name" => "NIB",
                "title" => 'nib'
            ],
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
        $list_product = collect([
            'Susu dan analognya',
            'Lemak, minyak, dan emulsi minyak',
            'Buah dan sayur dengan pengolahan dan penambahan bahan tambahan pangan',
            'Kembang gula/permen dan cokelat',
            'Serealia dan produk serealia yang merupakan produk turunan dari biji serealia, akardan umbi, kacang-kacangan dan empulur',
            'Produk bakteri',
            'Ikan dan produk perikanan, termasuk moluska, krustase, dan ekinodermata dengan pengloahan dan penambahan bahan ',
            'Telur olahan dan produk-produk telur hasil olahan',
            'Gula dan pemanis termasuk madu',
            'Garam, rempah, sup, saus, salad, serta produk protein',
            'Makanan ringan siap santap',
            'Penyediaan makanan dan minuman dengan pengolahan',
        ]);
        if ($id_number) {
            $data = Sertification::where("id_number", $id_number)->first();
        }
        return view('user-login.add-sertifikasi', [
            "title" => "Tambah Sertifikasi",
            "active" => 'sertifikasi',
            "list_file" => $list_file,
            "list_product" => $list_product,
            "id_number" => $id_number,
            "data" => isset($data) ? $data : false
        ]);
    }
    public function detilSertif($id_number)
    {
        // $data = Sertification::where("id_number", $id_number)->first();
        // dd($data, $data->factory);
        return view('user-login.detail', [
            "title" => "Detail Sertifikasi",
            "active" => "sertifikasi",
            "data" => Sertification::where("id_number", $id_number)->first()
        ]);
    }
}
