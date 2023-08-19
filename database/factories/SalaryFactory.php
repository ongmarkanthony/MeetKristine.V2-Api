<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Salary>
 */
class SalaryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'user_id'=>User::factory(),
            'pay_schedule'=>fake()->randomElement(['monthly','semi-monthly']),
            'incentives'=>fake()->randomNumber(4,true),
            'salary_amount'=>fake()->randomNumber(5,true)
        ];
    }
}
