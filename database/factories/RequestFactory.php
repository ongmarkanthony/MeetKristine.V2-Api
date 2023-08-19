<?php

namespace Database\Factories;

use App\Models\Leave;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Request>
 */
class RequestFactory extends Factory
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
            'leave_id'=>Leave::factory(),
            'requested_date'=>fake()->date(),
            'type'=>fake()->randomElement(['paid','unpaid'])
        ];
    }
}
