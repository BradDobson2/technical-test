<?php

use App\Models\ComponentType;
use App\Models\User;
use Database\Seeders\ComponentTypeSeeder;
use Laravel\Sanctum\Sanctum;

test('returns unauthorized response for invalid or missing token', function () {
    $response = $this->getJson('/api/component-types');
    $response->assertStatus(401);
});

test('returns component types', function () {
    $this->seed(ComponentTypeSeeder::class);

    Sanctum::actingAs(User::factory()->create());

    $response = $this->getJson('/api/component-types');

    $types = ComponentType::all();

    $response->assertStatus(200);

    $types->each(function (ComponentType $type) use ($response) {
        $response->assertJsonFragment([
            'id' => $type->id,
            'type' => $type->type,
        ]);
    });
});
