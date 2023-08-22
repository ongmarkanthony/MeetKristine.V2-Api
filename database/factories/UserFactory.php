<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'username' => fake()->unique()->userName(),
            'employee_num' => 'MK-' . fake()->unique()->randomNumber(4, true),
            'email' => fake()->unique()->firstName . '@meetkristine.com',
            'password'=>fake()->password(),
            'firstName' => fake()->firstName,
            'lastName' => fake()->lastName,
            'jobTitle' => fake()->randomElement(['IT Manager', 'HR Manager', 'Accounting Head', 'Finance Head', 'Marketing', 'Sales Director']),
            'department' => fake()->randomElement(['Admin', 'HR', 'Accounting', 'Finance', 'Marketing', 'Sales']),
            'dateHired' => fake()->dateTimeThisDecade(),
            'dateOfBirth' => fake()->dateTimeThisDecade('-10 years'),
            'gender' => fake()->randomElement(['male', 'female']),
            'address1' => fake()->address,
            'address2' => fake()->secondaryAddress(),
            'city' => fake()->randomElement(['Makati City', 'Taguig City', 'Quezon City', 'Pasay City', 'City of Manila', 'Caloocan', 'Malabon City', 'Mandaluyong', 'Muntinlupa', 'Navotas', 'Paranaque', 'Pasay', 'San Juan']),
            'country' => fake()->randomElement(['Philippines', 'United States', 'Hong Kong']),
            'postalCode' => fake()->postcode,
            'sssNumber' => 'SSS-' . fake()->randomNumber(9, true),
            'philNumber' => 'PHIL-' . fake()->randomNumber(9, true),
            'tinNumber' => 'TIN-' . fake()->randomNumber(9, true),
            'hdmfNumber' => 'HDMF-' . fake()->randomNumber(9, true),
            'bankName' => fake()->randomElement(['BPI', 'UNIONBANK', 'BDO', 'Metrobank']),
            'bankAccount' => 'MK-' . fake()->randomNumber(9, true),
            'accrual'=>fake()->numberBetween(1,15),
            'sl_credits'=>fake()->randomDigit(),
            'vl_credits'=>fake()->randomDigit(),
            'el_credits'=>fake()->randomDigit(),
            'pay_schedule'=>fake()->randomElement(['monthly','semi-monthly']),
            'salary_amount'=>fake()->randomNumber(5,true),
            'incentives'=>fake()->randomNumber(4,true),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
