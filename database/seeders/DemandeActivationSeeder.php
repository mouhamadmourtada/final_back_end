<?php

namespace Database\Seeders;

use App\Models\DemandeActivation;
use Illuminate\Database\Seeder;

class DemandeActivationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DemandeActivation::factory(10)->create();
    }
}
