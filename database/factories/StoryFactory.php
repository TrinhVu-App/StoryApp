<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Story>
 */
class StoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'storyName' => $this->faker->unique(true)->lexify(),
            'author' => $this->faker->name(),
            'illustrator' => $this->faker->name(),
            'price' => $this->faker->numberBetween(0, 500),
            'like' => $this->faker->numberBetween(0, 2000),
            'read' => $this->faker->boolean(),
            'listen' => $this->faker->boolean(),
            'practice' => $this->faker->boolean(),
            'thumbnail' => $this->faker->numberBetween(2, 6),
            'level' => $this->faker->randomKey(['A', 'B', 'C'])
        ];
    }
}
