<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DemandeActivationFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => createOrRandomFactory(\App\Models\User::class),
			'etat' => $this->faker->randomElement(['cours', 'rejetee', 'valid']),
        ];
    }
}
