<?php

use App\Http\Resources\WindFarmResource;
use App\Models\Component;
use App\Models\Inspection;
use App\Models\InspectionComponent;
use App\Models\Turbine;
use App\Models\User;
use App\Models\WindFarm;
use Database\Seeders\ComponentGradeSeeder;
use Database\Seeders\ComponentTypeSeeder;
use Laravel\Sanctum\Sanctum;

test('returns unauthorized response for invalid or missing token', function () {
    $response = $this->getJson('/api/wind-farm');

    $response->assertStatus(401);
});

test('returns authenticated user\'s wind farm', function () {
    $this->seed(ComponentGradeSeeder::class);
    $this->seed(ComponentTypeSeeder::class);

    $user = User::factory()->create();

    $windFarm = WindFarm::factory()->has(
        Turbine::factory(1)
            ->has(Component::factory()->bladeType())
            ->has(Component::factory()->rotorType())
            ->has(Component::factory()->hubType())
            ->has(Component::factory()->generatorType())
    )->create(['user_id' => $user->id]);

    $windFarm->turbines->each(function (Turbine $turbine) {
        $inspection = $turbine->inspections()->save(Inspection::factory()->make());

        $turbine->components->each(function (Component $component) use ($inspection) {
            InspectionComponent::factory()
                ->forComponent($component)
                ->forInspection($inspection)
                ->randomGrade()
                ->create();
        });
    });

    Sanctum::actingAs($user);

    $response = $this->getJson('/api/wind-farm');

    $windFarm->load(['turbines' => ['components', 'inspections' => ['inspectionComponents']]]);
    $windFarmResource = new WindFarmResource($windFarm);
    $response->assertJson($windFarmResource->response()->getData(true));
});
