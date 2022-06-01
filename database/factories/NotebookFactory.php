<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Notebook>
 */
class NotebookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'fio' => $this->faker->name(),
            'company' => $this->faker->optional()->company(),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'birth_date' => $this->faker->optional()->date(),
            'photo' => $this->faker->imageUrl(),
        ];
    }
}
