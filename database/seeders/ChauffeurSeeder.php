<?php

namespace Database\Seeders;

use App\Models\Chauffeur;
use Illuminate\Database\Seeder;

class ChauffeurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Chauffeur::factory(10)->create();
    }
}
