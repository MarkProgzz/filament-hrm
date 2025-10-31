<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EducationalBackground extends Model
{
    /** @use HasFactory<\Database\Factories\EducationalBackgroundFactory> */
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'level',
        'school_name',
        'degree_course',
        'from_date',
        'to_date',
        'units_earned',
        'year_graduated',
        'Honor',
    ];

    protected $casts = [
        'from_date' => 'date',
        'to_date' => 'date',
    ];

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }
}
