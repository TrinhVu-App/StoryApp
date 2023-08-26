<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Page>
 */
class PageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'textID' => $this->faker->numberBetween(1, 100),
            'storyID' => $this->faker->numberBetween(1, 10),
            'audioID' => $this->faker->numberBetween(1,35),
            'imageID' => $this->faker->numberBetween(1, 10),
            'pageNum' => $this->faker->randomDigit()
        ];
    }
}
