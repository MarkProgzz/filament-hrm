<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LeaveRequestApproval extends Model
{
    /** @use HasFactory<\Database\Factories\LeaveRequestApprovalFactory> */
    use HasFactory;

    protected $fillable = [
        'leave_request_id',
        'approver_id',
        'status',
        'sequence',
        'approved_at',
        'comments',
    ];

    protected $casts = [
        'sequence' => 'integer',
        'approved_at' => 'datetime',
    ];

    public function leaveRequest(): BelongsTo
    {
        return $this->belongsTo(LeaveRequest::class);
    }

    public function approver(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'approver_id');
    }
}
