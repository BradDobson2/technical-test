<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use MatanYadaev\EloquentSpatial\Objects\Polygon;
use MatanYadaev\EloquentSpatial\Objects\LineString;
use MatanYadaev\EloquentSpatial\Objects\Point;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WindFarm>
 */
class WindFarmFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->city() . ' Wind Farm',
            'area' => new Polygon([
                new LineString([
                    new Point(12.455363273620605, 41.90746728266806),
                    new Point(12.450309991836548, 41.906636872349075),
                    new Point(12.445632219314575, 41.90197359839437),
                    new Point(12.447413206100464, 41.90027269624499),
                    new Point(12.457906007766724, 41.90000118654431),
                    new Point(12.458517551422117, 41.90281205461268),
                    new Point(12.457584142684937, 41.903107507989986),
                    new Point(12.457734346389769, 41.905918239316286),
                    new Point(12.45572805404663, 41.90637337450963),
                    new Point(12.455363273620605, 41.90746728266806),
                ]),
            ]),
        ];
    }

    public function forUser(User $user): Factory
    {
        return $this->state(function (array $attributes) use ($user) {
            return [
                'user_id' => $user->id,
            ];
        });
    }

    public function area(Polygon $area): Factory
    {
        return $this->state(function (array $attributes) use ($area) {
            return [
                'area' => $area,
            ];
        });
    }
}
