<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EmploymentStatus>
 */
class EmploymentStatusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'employee_id' => \App\Models\Employee::inRandomOrder()->first()?->id,
            'name' => fake()->randomElement(['Active', 'Employed', 'On Probation', 'Inactive', 'Terminated', 'Resigned', 'Retired']),
        ];
    }
}
