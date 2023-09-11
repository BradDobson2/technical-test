<?php

namespace Database\Factories;

use App\Models\ComponentGrade;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ComponentGradeFactory extends Factory
{
    private const DESCRIPTIONS = [
        ComponentGrade::ONE => 'Perfect',
        ComponentGrade::TWO => 'Blemished',
        ComponentGrade::THREE => 'Damaged',
        ComponentGrade::FOUR => 'Heavily damaged',
        ComponentGrade::FIVE => 'Broken or missing',
    ];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $grade = Arr::random(ComponentGrade::VALID_GRADES);

        return [
            'grade' => $grade,
            'description' => self::DESCRIPTIONS[$grade],
        ];
    }

    public function one(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'grade' => ComponentGrade::ONE,
                'description' => self::DESCRIPTIONS[ComponentGrade::ONE],
            ];
        });
    }

    public function two(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'grade' => ComponentGrade::TWO,
                'description' => self::DESCRIPTIONS[ComponentGrade::TWO],
            ];
        });
    }

    public function three(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'grade' => ComponentGrade::THREE,
                'description' => self::DESCRIPTIONS[ComponentGrade::THREE],
            ];
        });
    }

    public function four(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'grade' => ComponentGrade::FOUR,
                'description' => self::DESCRIPTIONS[ComponentGrade::FOUR],
            ];
        });
    }

    public function five(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'grade' => ComponentGrade::FIVE,
                'description' => self::DESCRIPTIONS[ComponentGrade::FIVE],
            ];
        });
    }
}
