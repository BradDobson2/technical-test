<?php

namespace Database\Factories;

use App\Models\ComponentType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Component>
 */
class ComponentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'serial_number' => Str::uuid(),
        ];
    }

    public function bladeType(): Factory
    {
        return $this->state(function (array $attributes) {
            $bladeType = ComponentType::blade()->first();

            return [
                'component_type_id' => $bladeType->id ?? ComponentType::factory()->blade(),
            ];
        });
    }

    public function rotorType(): Factory
    {
        return $this->state(function (array $attributes) {
            $rotorType = ComponentType::rotor()->first();

            return [
                'component_type_id' => $rotorType->id ?? ComponentType::factory()->rotor(),
            ];
        });
    }

    public function hubType(): Factory
    {
        return $this->state(function (array $attributes) {
            $hubType = ComponentType::hub()->first();

            return [
                'component_type_id' => $hubType->id ?? ComponentType::factory()->hub(),
            ];
        });
    }

    public function generatorType(): Factory
    {
        return $this->state(function (array $attributes) {
            $generatorType = ComponentType::generator()->first();

            return [
                'component_type_id' => $generatorType->id ?? ComponentType::factory()->generator(),
            ];
        });
    }
}
