<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Leave;
use App\Models\Request;
use App\Models\Salary;
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
            ->has(Leave::factory(3)
                ->has(Request::factory(5)))
            ->has(Salary::factory())
            ->create();
    }
}
