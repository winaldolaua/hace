<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SertificationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //'status_id' => $this->faker->numberBetween(1, 12),
            'status_id' => 10,
            'date' => $this->faker->date(),
            'apply_number' => $this->faker->randomNumber(7, true),
            'service_type' => $this->faker->lexify('service type ????????'),
            'brand_name' => $this->faker->lexify('brand ????????'),
            'lph' => $this->faker->lexify('lph ?????'),
            'doc_type' => $this->faker->lexify('doc type ???????'),
            'product_type' => $this->faker->lexify('product type ?????'),
            'bills' => 10000,
            'install_area' => $this->faker->lexify('area ??????')
        ];
    }
}
