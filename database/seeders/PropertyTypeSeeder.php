<?php

namespace Database\Seeders;

use App\Enums\PropertyType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PropertyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         \App\Models\PropertyType::factory()->create([
             'name' => PropertyType::DETACHED,
             'description' => 'A single dwelling not attached to any other dwelling or structure (except its own garage or shed)',
             'is_active' => true,
         ]);

        \App\Models\PropertyType::factory()->create([
            'name' => PropertyType::SEMI_DETACHED,
            'description' => 'a single family duplex dwelling house that shares one common wall with the next house',
            'is_active' => true,
        ]);

        \App\Models\PropertyType::factory()->create([
            'name' => PropertyType::FLAT,
            'description' => "a housing unit that's self-contained but is part of a larger building with several units",
            'is_active' => true,
        ]);

        \App\Models\PropertyType::factory()->create([
            'name' => PropertyType::TERRACED,
            'description' => 'a house built as part of a continuous row in a uniform style',
            'is_active' => true,
        ]);

        \App\Models\PropertyType::factory()->create([
            'name' => PropertyType::BUNGALOW,
            'description' => 'a small house or cottage that is either single-story or has a second story built into a sloping roof (usually with dormer windows)',
            'is_active' => true,
        ]);
    }
}
