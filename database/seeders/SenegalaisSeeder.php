<?php

namespace Database\Seeders;

use App\Models\Senegalais;
use Illuminate\Database\Seeder;

class SenegalaisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Senegalais::factory(10)->create();
    }
}
