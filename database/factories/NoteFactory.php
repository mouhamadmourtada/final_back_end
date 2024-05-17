<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class NoteFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => createOrRandomFactory(\App\Models\User::class),
			'course_id' => createOrRandomFactory(\App\Models\Course::class),
			'note' => $this->faker->firstName(),
        ];
    }
}
