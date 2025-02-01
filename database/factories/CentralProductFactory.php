<?php

namespace Database\Factories;

use App\Models\CentralProduct;
use Illuminate\Database\Eloquent\Factories\Factory;

class CentralProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CentralProduct::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // List of predefined image paths
        $images = [
            'central-images/default.jpg',
            'central-images/pexels-gozde-vanli-1724169593-29977340.jpg',
            'central-images/pexels-heyho-7195851.jpg',
            'central-images/pexels-nicola-barts-7927011.jpg',
            'central-images/pexels-skylar-kang-6478344.jpg',
        ];

        return [
            'name' => $this->faker->word,
            'image' => $this->faker->randomElement($images),
            'description' => $this->faker->sentence,
            'price' => $this->faker->numberBetween(50, 500),
            'is_active' => $this->faker->boolean,
        ];
    }
}
