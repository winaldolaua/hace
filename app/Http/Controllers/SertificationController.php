<?php

namespace App\Http\Controllers;

use App\Models\Factory;
use App\Models\Legalist;
use App\Models\Outlet;
use App\Models\Product;
use App\Models\Responsibler;
use App\Models\Sertification;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class SertificationController extends Controller
{
    public function addSertif(Request $request)
    {
        // $list_file = ['surat-permohonan', 'formulir-pendaftaran', 'aspek-legal', 'penyelia-halal', 'daftar-produk', 'proses-pengolahan', 'jaminan-halal', 'salinan-sertif', 'lainnya'];
        // foreach ($list_file as $index => $value) {
        //     // $file->put($value, $request->file('file' . $index));
        //     $file = $request->file('file' . $index);
        //     $file->storePubliclyAs($value, "file-" . Str::random(3) . "-" . $file->getClientOriginalName(), "public");
        // }
        $legalist = collect([]);
        $factory = collect([]);
        $outlet = collect([]);
        $product = collect([]);
        foreach ($request->all() as $index => $value) {
            if (Str::contains($index, 'aspect-')) $legalist->put($index, $value);
            else if (Str::contains($index, 'factory-')) $factory->put($index, $value);
            else if (Str::contains($index, 'outlet-')) $outlet->put($index, $value);
            else if (Str::contains($index, 'product-')) $product->put($index, $value);
            else "not";
        }
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
            DB::transaction(function () use ($request, $legalist) {
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
                // foreach($legalist as $index => $legal){
                //      = Legalist::crate([

                //     ]);
                // }
                // $fac = Factory::create($data['factory']);
                // $outlet = Outlet::create($data['outlet']);
                // $product = Product::create($data['product']);
                // $data['certification']->put('product_id', $legal->id);
                // Sertification::create($certif);
                // $certif = $data['certification']->toArray();
                echo "Done Ga Bang??? DOOON!";
            });
        } catch (QueryException $error) {
            dd($error);
        }
    }
}
