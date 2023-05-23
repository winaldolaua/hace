<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Product::class;
    public function definition()
    {
        return [
            'status' => $this->faker->randomNumber(5,false),
            'id_reg' => $this->faker->randomNumber(3,false),
            'reg_number' => $this->faker->randomNumber(7,false),
            'name' => $this->faker->name(),
            'address' => $this->faker->streetAddress(),
            'product_type' => $this->faker->randomElement(['nasi','es krim']),
            'brand_name' => 'baleluwe'
        ];
    }
}
