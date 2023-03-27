<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Property::factory()->create([
            'name' => 'Detached',
            'description' => 'A single dwelling not attached to any other dwelling or structure (except its own garage or shed)',
            'is_active' => true,
        ]);

        \App\Models\Property::factory()->create([
            'name' => 'Semi-detached',
            'description' => 'A single family duplex dwelling house that shares one common wall with the next house',
        ]);

        \App\Models\Property::factory()->create([
            'name' => 'Flat',
            'description' => 'A housing unit that\'s self-contained but is part of a larger building with several units',
        ]);

        \App\Models\Property::factory()->create([
            'name' => 'Terraced',
            'description' => 'A house built as part of a continuous row in a uniform style',
        ]);

        \App\Models\Property::factory()->create([
            'name' => 'Bungalow',
            'description' => 'A small house or cottage that is either single-story or has a second story built into a sloping roof (usually with dormer windows)',
        ]);
    }
}
