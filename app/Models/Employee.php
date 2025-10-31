<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Employee extends Model
{
    /** @use HasFactory<\Database\Factories\EmployeeFactory> */
    use HasFactory;

    protected $fillable = [
        'designation_id',
        'department_id',
        'photo',
        'date_joined',
        'role',
        'school_id',
        'first_name',
        'last_name',
        'middle_name',
        'street',
        'barangay',
        'municapality',
        'province',
        'birthdate',
        'birthplace',
        'citizenship',
        'religion',
        'distinguishing_marks',
        'height',
        'weight',
        'blood_type',
        'tin_no',
        'sss_no',
        'pagibig_no',
        'philhealth_no',
        'prc_reg_no',
        'prc_expired',
        'gender',
        'civil_status',
        'email',
        'landline_number',
        'phone_number',
        'no_children',
    ];

    protected $casts = [
        'date_joined' => 'date',
        'birthdate' => 'date',
        'prc_expired' => 'date',
        'no_children' => 'integer',
    ];

    public function getFullNameAttribute(): string
    {
        return $this->first_name . ($this->middle_name ? ' ' . $this->middle_name : '') . ' ' . $this->last_name;
    }

    public function getProfilePictureAttribute()
    {
        if ($this->photo) {
            return asset('storage/' . $this->photo);
        }

        // fallback if no profile picture exists
        return asset('image/default-photo.png');
    }

    public function employmentStatus(): HasOne
    {
        return $this->hasOne(EmploymentStatus::class);
    }

    public function jobHistories(): HasMany
    {
        return $this->hasMany(JobHistory::class);
    }

    public function familyBackground(): HasOne
    {
        return $this->hasOne(FamilyBackground::class);
    }

    public function emergencyContacts(): HasMany
    {
        return $this->hasMany(EmergencyContact::class);
    }

    public function beneficiaries(): HasMany
    {
        return $this->hasMany(Beneficiary::class);
    }

    public function educationalBackgrounds(): HasMany
    {
        return $this->hasMany(EducationalBackground::class);
    }

    public function civilServices(): HasMany
    {
        return $this->hasMany(CivilService::class);
    }

    public function workExperiences(): HasMany
    {
        return $this->hasMany(WorkExperience::class);
    }

    public function trainings(): HasMany
    {
        return $this->hasMany(Training::class);
    }

    public function skillSpecializations(): HasMany
    {
        return $this->hasMany(SkillSpecialization::class);
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function designation(): BelongsTo
    {
        return $this->belongsTo(Designation::class);
    }

    public function contracts(): HasMany
    {
        return $this->hasMany(Contract::class);
    }

    public function salaries(): HasMany
    {
        return $this->hasMany(Salary::class);
    }

    public function payrolls(): HasMany
    {
        return $this->hasMany(Payroll::class);
    }

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }

    public function leaveRequests(): HasMany
    {
        return $this->hasMany(LeaveRequest::class);
    }

    public function leaveBalances(): HasMany
    {
        return $this->hasMany(LeaveBalance::class);
    }

    public function managedLeaveRequests(): HasMany
    {
        return $this->hasMany(LeaveRequest::class, 'approved_by');
    }

    public function managedDepartments(): HasMany
    {
        return $this->hasMany(Department::class, 'manager_id');
    }

    public function approvedLeaveRequests(): HasMany
    {
        return $this->hasMany(LeaveRequestApproval::class, 'approver_id');
    }
}
