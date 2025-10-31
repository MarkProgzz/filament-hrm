<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LeaveTypeApprover extends Model
{
    /** @use HasFactory<\Database\Factories\LeaveTypeApproverFactory> */
    use HasFactory;

    protected $fillable = [
        'leave_type_id',
        'approver_id',
        'sequence',
    ];

    protected $casts = [
        'sequence' => 'integer',
    ];

    public function leaveType(): BelongsTo
    {
        return $this->belongsTo(LeaveType::class);
    }

    public function approver(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'approver_id');
    }
}
