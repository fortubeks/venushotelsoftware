<?php

namespace Database\Factories;

use App\Constants\AppConstants;
use App\Constants\StatusConstants;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_account_id' => '1',
            'first_name' => fake()->name(),
            'last_name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'role' => array_rand( AppConstants::ROLE_OPTIONS),
            'email_verified_at' => now(),
            'photo' => fake()->image(),
            'phone' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'status' => 'active',
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }


    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => now(),
        ]);
    }
}
