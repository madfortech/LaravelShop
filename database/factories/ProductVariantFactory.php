<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ProductVariant;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductVariant>
 */
class ProductVariantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = ProductVariant::class;

    public function definition(): array
    {
        $uniqueNames = ['red', 'blue', 'green', 'white'];
        $uniqueSizes = ['s', 'm', 'xl', 'xxl'];

        return [
            'color' => $this->faker->randomElement($uniqueNames),
            'size' => $this->faker->randomElement($uniqueSizes),
            
        ];
    }
}
