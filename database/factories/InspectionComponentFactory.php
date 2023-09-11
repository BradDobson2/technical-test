<?php

namespace Database\Factories;

use App\Models\Component;
use App\Models\ComponentGrade;
use App\Models\Inspection;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\InspectionComponent>
 */
class InspectionComponentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'image_url' => $this->faker->imageUrl(),
        ];
    }

    public function forInspection(Inspection $inspection): Factory
    {
        return $this->state(function (array $attributes) use ($inspection) {
            return [
                'inspection_id' => $inspection->id,
            ];
        });
    }

    public function forComponent(Component $component): Factory
    {
        return $this->state(function (array $attributes) use ($component) {
            return [
                'component_id' => $component->id,
            ];
        });
    }

    public function randomGrade(): Factory
    {
        $gradeName = Arr::random(ComponentGrade::VALID_GRADES);
        $grade = ComponentGrade::where('grade', $gradeName)->first();

        return $this->state(function (array $attributes) use ($grade) {
            return [
                'component_grade_id' => $grade->id ?? ComponentGrade::factory()->state(['grade' => $grade]),
            ];
        });
    }
}
