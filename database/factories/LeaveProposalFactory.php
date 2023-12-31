<?php

namespace Database\Factories;

use App\Models\LeaveCredit;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Request>
 */
class LeaveProposalFactory extends Factory
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
            'requested_date'=>fake()->date(),
            'type'=>fake()->randomElement(['paid','unpaid']),
            'leave_type'=>fake()->randomElement(['sick','emergency','vacation','maternity'])
        ];
    }
}
