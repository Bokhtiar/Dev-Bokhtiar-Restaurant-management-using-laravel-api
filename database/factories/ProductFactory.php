<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
          'category_id' => $this->faker->randomDigit(),
          'product_name' => $this->faker->name,
          'description' => $this->faker->text,
          'price' => $this->faker->randomDigit(),
          'video' => 'null',
          'thumbnail_image' => 'null',
          'images' => 'null',
          'status'=>1,
        ];
    }
}
