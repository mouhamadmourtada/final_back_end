<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => createOrRandomFactory(\App\Models\User::class),
			'date' => $this->faker->dateTime(),
        ];
    }
}
