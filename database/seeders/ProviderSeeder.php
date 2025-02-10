<?php

namespace Database\Seeders;

use App\Models\Provider;
use Database\Factories\ProviderFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Provider::factory()->count(8)->create();
    }
}
