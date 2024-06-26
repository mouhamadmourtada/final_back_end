<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Senegalais;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Senegalais::factory(100)->create();
        \App\Models\User::factory(100)->create();
        \App\Models\DemandeActivation::factory(50)->create();

       ;
    }
}
