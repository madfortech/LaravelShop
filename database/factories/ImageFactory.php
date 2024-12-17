<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Image;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Image::class;

    public function definition(): array
    {
        $uniqueImages = [
            'media/example1.png',
             'media/example2.png',
              'media/example3.png',
               'media/example4.png',
                 'media/example5.png',
                   'media/example6.png',
                     'media/example7.png',
            ];
        return [
            'path' => $this->faker->randomElement($uniqueImages),
            

        ];
    }
}
