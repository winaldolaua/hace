<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'status' => 1,
            'id_reg' => 11,
            'reg_number' => 111,
            'name' => 'tes',
            'address' => 'G4',
            'product_type' => 'nasi',
            'brand_name' => 'baleluwe'
        ]);
    }
}
