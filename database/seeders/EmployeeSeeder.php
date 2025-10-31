<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employee::create([
            'photo' => null,
            'school_id' => 'EMP001',
            'entry_date' => now(),
            'first_name' => 'John',
            'last_name' => 'Doe',
            'middle_name' => 'M',
            'street' => '123 Main St',
            'barangay' => 'Barangay 1',
            'municipality' => 'City Name',
            'province' => 'Province Name',
            'birthdate' => '1990-01-01',
            'birthplace' => 'Birthplace',
            'citizenship' => 'Filipino',
            'religion' => 'Christian',
            'distinguishing_marks' => 'None',
            'height' => '170',
            'weight' => '70',
            'blood_type' => 'A+',
            'tin_no' => '123456789',
            'sss_no' => '1234567890',
            'pagibig_no' => '123456789012',
            'philhealth_no' => '1234567890123',
            'prc_reg_no' => 'PRC123',
            'prc_expired' => '2030-01-01',
            'gender' => 'Male',
            'civil_status' => 'Single',
            'email' => 'john.doe@example.com',
            'landline_number' => '123-4567',
            'phone_number' => '09123456789',
            'no_children' => 0,
        ]);
    }
}
