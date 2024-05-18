<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => fake()->lastName(),
            'prenom' => fake()->firstName(),
            'email' => fake()->unique()->safeEmail(),
            'telephone' => fake()->phoneNumber(),
            'adresse' => fake()->address(),
            'date_naissance' => fake()->date(),
            'lieu_naissance' => fake()->city(),
            'marque' => fake()->company(),
            'matricule' => fake()->unique()->regexify('[A-Z]{2}[0-9]{3}[A-Z]{2}'),
            'cin' => fake()->unique()->numberBetween(1000000000, 9999999999),
            'senegalais_id' => createOrRandomFactory(\App\Models\Senegalais::class),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            // comment on lance les seedesr
            // php artisan db:seed --class=UserSeeder
        ];

    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    /**
     * Assign a role to the user after creating it.
     */
    public function configure(): Factory
    {
        return $this->afterCreating(function ($user) {
            if(random_int(0, 2) == 0){
                $role = Role::firstOrCreate(['name' => 'admin']); // Crée le rôle 'client' s'il n'existe pas déjà
                $user->assignRole($role); // Assigner le rôle à l'utilisateur
            } else if(random_int(0, 2) == 1){
                $role = Role::firstOrCreate(['name' => 'client']); // Crée le rôle 'client' s'il n'existe pas déjà
                $user->assignRole($role); // Assigner le rôle à l'utilisateur
            } else {
                $role = Role::firstOrCreate(['name' => 'chauffeur']); // Crée le rôle 'client' s'il n'existe pas déjà
                $user->assignRole($role); // Assigner le rôle à l'utilisateur
            }
        });
    }


}
