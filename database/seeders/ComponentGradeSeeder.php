<?php

namespace Database\Seeders;

use App\Models\ComponentGrade;
use Illuminate\Database\Seeder;

class ComponentGradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ComponentGrade::factory()->one()->create();
        ComponentGrade::factory()->two()->create();
        ComponentGrade::factory()->three()->create();
        ComponentGrade::factory()->four()->create();
        ComponentGrade::factory()->five()->create();
    }
}
