<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(5)->create();

        // \App\Models\User::factory()->create([
        //     'nom' => 'Test',
        //     'prenom' => 'User',
        //     'telephone' => '1234567890',
        //     'adresse' => '123 Test St',
        //     'email' => 'test@example.com',
        //     'password' => Hash::make('password'),
        //     'cin' => '1234567890',
        //     'date_naissance' => '2000-01-01',
        //     'lieu_naissance' => 'Test City',
        //     'matricule' => '1ZZER90',
        //     'senegalais_id' => '12',
        //  ]);

        // \App\Models\User::factory()->create([
        //     'nom' => 'Test',
        //     'prenom' => 'User2',
        //     'telephone' => '12367890',
        //     'adresse' => '123 Test St',
        //     'email' => 'user2@example.com',
        //     'password' => Hash::make('password'),
        //     'cin' => '123152890',
        //     'date_naissance' => '2000-01-01',
        //     'lieu_naissance' => 'Test City',
        //     'matricule' => '1ZZER9KI',
        //     'senegalais_id' => '15'
        // ]);

        \App\Models\DemandeActivation::factory()->create([
            'user_id' => 8,
            'etat' => 'cours'
        ]);

        \App\Models\DemandeActivation::factory()->create([
            'user_id' => 9,
            'etat' => 'cours'
        ]);

        \App\Models\DemandeActivation::factory()->create([
            'user_id' => 10,
            'etat' => 'cours'
        ]);

        \App\Models\DemandeActivation::factory()->create([
            'user_id' => 11,
            'etat' => 'cours'
        ]);
    }
}
