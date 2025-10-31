<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Department::create(['name' => 'Human Resources']);
        Department::create(['name' => 'Information Technology']);
        Department::create(['name' => 'Finance']);
        Department::create(['name' => 'Marketing']);
        Department::create(['name' => 'Sales']);
        Department::create(['name' => 'Operations']);
        Department::create(['name' => 'Customer Service']);
    }
}
