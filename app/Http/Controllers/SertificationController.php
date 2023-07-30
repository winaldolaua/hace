<?php

namespace App\Http\Controllers;

use App\Models\Factory;
use App\Models\Legalist;
use App\Models\Outlet;
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
        $data = collect(
            [
                'certification' => collect([
                    'id_number' => random_int(1000, 9999),
                    'date' => Carbon::now(),
                    'apply_number' => $request->input('sertif-number'),
                    'service_type' => $request->input('sertif-layanan'),
                    'brand_name' => $request->input('produk-nama'),
                    'lph' => $request->input('sertif-lph'),
                    'doc_type' => $request->input('sertif-merek'),
                    'product_type' => $request->input('sertif-jenis-produk'),
                    'install_area' => $request->input('sertif-area')
                ]),
                'responsibler' => collect([
                    'name' => $request->input('responsibler-name'),
                    'email' => $request->input('responsibler-email'),
                    'number' => $request->input('responsibler-telp')
                ]),
                'legal' => collect([
                    'number' =>  $request->input('aspect-doc-number'),
                    'date' => $request->input('aspect-date'),
                    'type' => $request->input('aspect-doc'),
                    'agency_name' => $request->input('aspect-agency')
                ]),
                'factory' => collect([
                    'name' => $request->input('factory-name'),
                    'city' => $request->input('factory-city'),
                    'country' => $request->input('factory-country'),
                    'address' => $request->input('factory-address'),
                    'status' => 'gada',
                    'region' => $request->input('factory-region'),
                    'pos' => $request->input('factory-pos')
                ]),
                'outlet' => collect([
                    'name' => $request->input('outlet-name'),
                    'region' => $request->input('outlet-region'),
                    'pos' => $request->input('outlet-pos'),
                    'address' => $request->input('outlet-address'),
                    'city' => $request->input('outlet-city'),
                    'country' => $request->input('outlet-country')
                ])
            ]
        );

        // try {
        //     DB::transaction(function () use ($data) {
        //         $res = Responsibler::insert($data['responsibler']);
        //         $legal = Legalist::insert($data['legal']);
        //         $fac = Factory::insert($data['factory']);
        //         $outlet = Outlet::insert($data['outlet']);

        //         Sertification::insert($data['certification']);
        //         echo "Done Ga Bang??? DOOON!";
        //     });
        // } catch (QueryException $error) {
        //     dd($error);
        // }
    }
}
