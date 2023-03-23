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
             'name' => PropertyType::CONDOMINIUM,
             'description' => 'Condominium test description',
             'is_active' => true,
         ]);

        \App\Models\PropertyType::factory()->create([
            'name' => PropertyType::DUPLEX,
            'description' => 'Duplex test description',
            'is_active' => true,
        ]);

        \App\Models\PropertyType::factory()->create([
            'name' => PropertyType::TOWN_HOUSE,
            'description' => 'Townhouse test description',
            'is_active' => true,
        ]);
    }
}
