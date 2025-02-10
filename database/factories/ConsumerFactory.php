<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Consumer>
 */
class ConsumerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $tag1 = $this->faker->randomElement([['shield-0', 'shield-1',]]);
        $tag2 = $this->faker->randomElement([['square-0', 'square-1',]]);

        return [
            'name' => $this->faker->unique()->jobTitle,
            'tags' => [$tag1, $tag2],
        ];
    }
}
