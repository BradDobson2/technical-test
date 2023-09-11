<?php

namespace Database\Seeders;

use App\Models\ComponentType;
use Illuminate\Database\Seeder;

class ComponentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ComponentType::factory()->blade()->create();
        ComponentType::factory()->rotor()->create();
        ComponentType::factory()->hub()->create();
        ComponentType::factory()->generator()->create();
    }
}
