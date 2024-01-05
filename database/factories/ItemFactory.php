<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Model\Item;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'category_id' => $this->faker->randomNumber(),
            'description' => $this->faker->paragraph,
            'price' => $this->faker->numberBetween(100, 10000),
            'owner' => $this->faker->name,
            'publish' => $this->faker->boolean(80),
        ];
    }
}
