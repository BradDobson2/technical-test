<?php

namespace Database\Factories;

use App\Models\ComponentType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class ComponentTypeFactory extends Factory
{
    public function definition()
    {
        return [
            'type' => Arr::random(ComponentType::VALID_TYPES),
        ];
    }

    public function blade(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'type' => ComponentType::BLADE,
            ];
        });
    }

    public function rotor(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'type' => ComponentType::ROTOR,
            ];
        });
    }

    public function hub(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'type' => ComponentType::HUB,
            ];
        });
    }

    public function generator(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'type' => ComponentType::GENERATOR,
            ];
        });
    }
}
