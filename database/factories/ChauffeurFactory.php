<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ChauffeurFactory extends Factory
{
    public function definition(): array
    {
        return [
            'id' => $this->faker->text(),
			'nom' => $this->faker->firstName(),
			'prenom' => $this->faker->firstName(),
			'email' => $this->faker->safeEmail(),
			'telephone' => $this->faker->firstName(),
			'adresse' => $this->faker->firstName(),
			'date_naissance' => $this->faker->dateTime(),
			'lieu_naissance' => $this->faker->firstName(),
			'password' => $this->faker->firstName(),
			'matricule' => $this->faker->firstName(),
			'cin' => $this->faker->firstName(),
			'senegalais_id' => createOrRandomFactory(\App\Models\Senegalais::class),
			'marque' => $this->faker->firstName(),
			'annee_voiture' => $this->faker->firstName(),
        ];
    }
}
