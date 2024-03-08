<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Hash;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CustomersFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'phone' => fake()->phoneNumber,
            'email' => fake()->unique()->safeEmail(),
            'password' => Hash::make('password'),
            'address' => fake()->streetAddress,
            'dob' => fake()->dateTimeThisCentury->format('Y-m-d'),
            'status' =>  fake()->randomDigit([1,2]),
        ];
    }
}
