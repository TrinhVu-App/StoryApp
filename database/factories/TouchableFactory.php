<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Touchable>
 */
class TouchableFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'pageID' => $this->faker->numberBetween(1, 100),
            'textID' => $this->faker->numberBetween(1, 100),
            'imageID' => $this->faker->numberBetween(1, 10),
            'audioID' => $this->faker->numberBetween(1,35),
            'width' => $this->faker->randomNumber(3, true),
            'height' => $this->faker->randomNumber(3, true),
            'xPosition' => $this->faker->randomNumber(3, true),
            'yPosition' => $this->faker->randomNumber(3, true),
            'blinkOrder' => $this->faker->randomDigit()
        ];
    }
}
