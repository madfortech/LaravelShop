<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Product::class;

     
    public function definition(): array
    {
        $uniqueNames = ['tshirt', 'sweaters', 'blanket', 'jeans'];
        return [
            'name' => $this->faker->unique()->randomElement($uniqueNames),
            'description' => $this->faker->paragraph(3),
            'price' => $this->faker-> numberBetween(50, 450),

        ];

    }
}
