<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use App\Models\Sertification;
use App\Models\Responsibler;
use Illuminate\Database\Eloquent\Factories\Sequence;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Product::factory(10)->create();
        Responsibler::factory()->count(10)->create();
        Sertification::factory()->count(10)->sequence(fn (Sequence $sequence) => [
            'responsibler_id' => $sequence->index + 1,
            'factory_id' => $sequence->index + 1,
            'outlet_id' => $sequence->index + 1,
            'halalist_id' => $sequence->index + 1,
            'legalist_id' => $sequence->index + 1,
            'product_id' => $sequence->index + 1,
            'register_id' => $sequence->index + 1
        ])->create();
        $this->call([
            UserSeeder::class,
            RoleSeeder::class,
            StatusSeeder::class,
            // ProductSeeder::class,
        ]);
    }
}
