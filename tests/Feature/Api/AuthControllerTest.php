<?php

use App\Models\User;
use Illuminate\Testing\Fluent\AssertableJson;

test('returns error message for missing email field', function () {
    $response = $this->postJson('/api/auth', ['password' => 'password']);
    $response->assertStatus(422);
    $response->assertJsonValidationErrorFor('email', 'errors');
});

test('returns error message for invalid email field', function () {
    $response = $this->postJson('/api/auth', ['email' => 'invalidemail', 'password' => 'password']);
    $response->assertStatus(422);
    $response->assertJsonValidationErrorFor('email', 'errors');
});

test('returns error message for missing password field', function () {
    $response = $this->postJson('/api/auth', ['email' => 'joebloggs@gmail.com']);
    $response->assertStatus(422);
    $response->assertJsonValidationErrorFor('password', 'errors');
});

test('returns unauthorized response for incorrect credentials', function () {
    $response = $this->postJson('/api/auth', ['email' => 'joebloggs@gmail.com', 'password' => 'password']);
    $response->assertStatus(401);
});

test('returns user on successful authentication', function () {
    $user = User::factory()->create(['email' => 'joebloggs@gmail.com']);

    $response = $this->postJson('/api/auth', ['email' => 'joebloggs@gmail.com', 'password' => 'password']);

    $response->assertStatus(200);

    $response->assertJsonFragment([
        'name' => $user->name,
        'email' => $user->email,
    ]);
});
