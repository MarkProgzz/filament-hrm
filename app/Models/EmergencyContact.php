<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EmergencyContact extends Model
{
    /** @use HasFactory<\Database\Factories\EmergencyContactFactory> */
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'name',
        'relation',
        'contact_no',
        'address',
    ];

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }
}
