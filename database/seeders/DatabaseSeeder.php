<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->call([
            DepartmentSeeder::class,
            DesignationSeeder::class,
            EmploymentStatusSeeder::class,
        ]);

        Employee::factory(500)->create();

        \App\Models\Employee::all()->each(function ($employee) {
            $employee->employmentStatus()->create([
                'name' => fake()->randomElement(['Active', 'Employed', 'On Probation', 'Inactive', 'Terminated', 'Resigned', 'Retired']),
            ]);
        });
    }
}
