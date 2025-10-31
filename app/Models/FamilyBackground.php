<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FamilyBackground extends Model
{
    /** @use HasFactory<\Database\Factories\FamilyBackgroundFactory> */
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'father_name',
        'father_occupation',
        'mother_name',
        'mother_occupation',
        'spouse_name',
        'spouse_occupation',
        'guardian_name',
        'guardian_occupation',
    ];

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }
}
