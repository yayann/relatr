<?php

namespace Database\Seeders;

use App\Models\Consumer;
use App\Models\Provider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RelationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $providers = Provider::all();
        $consumers = Consumer::all();

        foreach ($providers as $provider) {
            $randomConsumers = $consumers->random(rand(1, 3));
            foreach ($randomConsumers as $consumer) {
                $provider->consumers()->attach($consumer->id);
            }
        }

        foreach ($providers as $provider) {
            $randomProviders = $providers->where('id', '!=', $provider->id)->random(rand(1, 3));
            foreach ($randomProviders as $randomProvider) {
                if (!$provider->toProviders()->where('to_provider_id', $randomProvider->id)->exists() &&
                    !$randomProvider->toProviders()->where('to_provider_id', $provider->id)->exists()) {
                    $provider->toProviders()->attach($randomProvider->id);
                }
            }
        }
    }
}
