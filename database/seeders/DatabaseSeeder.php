<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;

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
        $this->call([
            UserSeeder::class,
            RoleSeeder::class,
            StatusSeeder::class,
            // ProductSeeder::class,
        ]);
    }
}