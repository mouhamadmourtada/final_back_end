<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SenegalaisFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nom' => $this->faker->firstName(),
			'prenom' => $this->faker->firstName(),
			'adresse' => $this->faker->firstName(),
			'date_naissance' => $this->faker->dateTime(),
			'lieu_naissance' => $this->faker->firstName(),
			'cin' => $this->faker->firstName(),
			'telephone' => $this->faker->firstName(),
        ];
    }
}
