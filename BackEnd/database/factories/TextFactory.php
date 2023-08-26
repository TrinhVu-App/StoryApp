<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Text>
 */
class TextFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $roll = $this->faker->randomElement([0, 0, 0, 0, 0, 1]);
        if ($roll == 0) {
            return [
                'audioID' =>$this->faker->numberBetween(1, 35 ),
            'text'=> $this->faker->word(),
          'xPosition' => $this->faker->randomNumber(3, true),
            'yPosition' => $this->faker->randomNumber(3, true)
        ];
        }
        else {
            return [
                'audioID' => $this->faker->numberBetween(1, 35),
                'text' => $this->faker->sentence(),
                'xPosition' => $this->faker->randomNumber(3, true),
                'yPosition' => $this->faker->randomNumber(3, true)
            ];
        }
    }
}
