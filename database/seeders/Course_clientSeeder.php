<?php

namespace Database\Seeders;

use App\Models\Course_client;
use Illuminate\Database\Seeder;

class Course_clientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Course_client::factory(10)->create();
    }
}
