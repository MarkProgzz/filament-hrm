<?php

namespace Database\Seeders;

use App\Models\EmploymentStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmploymentStatusSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EmploymentStatus::create(['employee_id' => null, 'name' => 'Active']);
        EmploymentStatus::create(['employee_id' => null, 'name' => 'Employed']);
        EmploymentStatus::create(['employee_id' => null, 'name' => 'On Probation']);
        EmploymentStatus::create(['employee_id' => null, 'name' => 'Inactive']);
        EmploymentStatus::create(['employee_id' => null, 'name' => 'Terminated']);
        EmploymentStatus::create(['employee_id' => null, 'name' => 'Resigned']);
        EmploymentStatus::create(['employee_id' => null, 'name' => 'Retired']);
    }
}
