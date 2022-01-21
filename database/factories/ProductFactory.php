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
            'name' => $this->faker->sentence(mt_rand(5, 10)),
            'slug' => $this->faker->slug(),
            'category_id' => mt_rand(1, 6),
            'description' => $this->faker->paragraphs(mt_rand(5, 8)),
            'ori_price' => $this->faker->numberBetween(100000, 500000),
            'disc_price' => $this->faker->numberBetween(10000, 100000),
            'main_image' => 'https://picsum.photos/200',
            'quantity' => $this->faker->numberBetween(15, 100),
            'status' => 1,
            'trending' => 0
        ];
    }
}
