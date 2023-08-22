<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\LeaveCredit;
use App\Models\LeaveProposal;
use App\Models\Salary;
use App\Models\TimeEvent;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'username'=>'admin-user',
            'role'=>'admin'
        ]);
        User::factory(20)
            ->has(LeaveProposal::factory(5))
            ->has(Salary::factory())
            ->has(TimeEvent::factory())
            ->create();

        // Salary::factory(20)->create();
    }
}
