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
}
