<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LeaveType>
 */
class LeaveTypeFactory extends Factory
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
            'name'=>fake()->randomElement(['personal','sick','emergency','parental']),
            'available_credit'=>fake()->numberBetween(1,15),
            'updated_at'=>fake()->dateTime(),
            'created_at'=>fake()->dateTime(),
            'user_id'=>User::factory()

        ];
    }
}
