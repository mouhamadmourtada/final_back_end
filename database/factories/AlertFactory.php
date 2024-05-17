<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AlertFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => createOrRandomFactory(\App\Models\User::class),
			'course_id' => createOrRandomFactory(\App\Models\Course::class),
			'description' => $this->faker->text(),
        ];
    }
}
