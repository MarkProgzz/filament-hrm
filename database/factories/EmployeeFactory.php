<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'designation_id' => \App\Models\Designation::inRandomOrder()->first()->id ?? \App\Models\Designation::factory()->create()->id,
            'department_id' => \App\Models\Department::inRandomOrder()->first()->id ?? \App\Models\Department::factory()->create()->id,
            'photo' => null,
            'entry_date' => now(),
            'school_id' => 'EMP' . $this->faker->unique()->numberBetween(100, 999),
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'middle_name' => $this->faker->firstName(),
            'street' => $this->faker->streetAddress(),
            'barangay' => $this->faker->streetAddress(),
            'municipality' => $this->faker->city(),
            'province' => $this->faker->state(),
            'birthdate' => $this->faker->date(),
            'birthplace' => $this->faker->city(),
            'citizenship' => 'Filipino',
            'religion' => 'Christian',
            'distinguishing_marks' => 'None',
            'height' => $this->faker->numberBetween(150, 200),
            'weight' => $this->faker->numberBetween(50, 100),
            'blood_type' => $this->faker->randomElement(['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-']),
            'tin_no' => $this->faker->numerify('#########'),
            'sss_no' => $this->faker->numerify('###########'),
            'pagibig_no' => $this->faker->numerify('#############'),
            'philhealth_no' => $this->faker->numerify('##############'),
            'prc_reg_no' => 'PRC' . $this->faker->numerify('###'),
            'prc_expired' => $this->faker->date(),
            'gender' => $this->faker->randomElement(['Male', 'Female']),
            'civil_status' => $this->faker->randomElement(['Single', 'Married', 'Widowed', 'Separated', 'Divorced', 'Solo Parent']),
            'email' => $this->faker->unique()->safeEmail(),
            'landline_number' => $this->faker->phoneNumber(),
            'phone_number' => $this->faker->phoneNumber(),
            'no_children' => $this->faker->numberBetween(0, 5),
        ];
    }
}
