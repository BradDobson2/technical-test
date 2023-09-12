<?php

use App\Models\ComponentGrade;
use App\Models\User;
use Database\Seeders\ComponentGradeSeeder;
use Laravel\Sanctum\Sanctum;

test('returns unauthorized response for invalid or missing token', function () {
    $response = $this->getJson('/api/component-grades');
    $response->assertStatus(401);
});

test('returns component grades', function () {
    $this->seed(ComponentGradeSeeder::class);

    Sanctum::actingAs(User::factory()->create());

    $response = $this->getJson('/api/component-grades');

    $grades = ComponentGrade::all();

    $response->assertStatus(200);

    $grades->each(function (ComponentGrade $grade) use ($response) {
        $response->assertJsonFragment([
            'id' => $grade->id,
            'grade' => $grade->grade,
            'description' => $grade->description
        ]);
    });
});
