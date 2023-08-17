<?php

namespace Database\Factories;

use App\Models\LeaveType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LeaveRequest>
 */
class LeaveRequestFactory extends Factory
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
            'leave_types_id'=>LeaveType::factory(),
            'status'=>fake()->randomElement(['approved','rejected','pending']),
            'request_date'=>fake()->dateTime(),
            'start_date'=>fake()->dateTime(),
            'end_date'=>fake()->dateTime(),
        ];
    }
}
