<?php

namespace Database\Factories;

use App\Models\Card;
use Illuminate\Database\Eloquent\Factories\Factory;

class CardFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Card::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'card_type' => $this->faker->randomElement(['Monster', 'Spell', 'Trap']),
            'description' => $this->faker->paragraph(),
            'password' => $this->faker->randomNumber(8, true)
        ];
    }
}
