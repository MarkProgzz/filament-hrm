<?php

namespace Database\Seeders;

use App\Models\Designation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DesignationSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Designation::create(['title' => 'HR Manager']);
        Designation::create(['title' => 'Software Developer']);
        Designation::create(['title' => 'Accountant']);
        Designation::create(['title' => 'Marketing Coordinator']);
        Designation::create(['title' => 'Sales Representative']);
        Designation::create(['title' => 'Operations Manager']);
        Designation::create(['title' => 'Customer Support Specialist']);
        Designation::create(['title' => 'Administrative Assistant']);
        Designation::create(['title' => 'Project Manager']);
        Designation::create(['title' => 'Intern']);
    }
}
