<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    /** @use HasFactory<\Database\Factories\SalaryFactory> */
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'base_salary',
        'allowances',
        'deductions',
        'effective_date',
        'pay_frequency',
    ];

    protected $casts = [
        'base_salary' => 'decimal:2',
        'allowances' => 'decimal:2',
        'deductions' => 'decimal:2',
        'effective_date' => 'date',
    ];

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    public function scopeCurrent($query)
    {
        return $query->where('effective_date', '<=', now()->toDateString())->orderBy('effective_date', 'desc');
    }

    public function scopeByFrequency($query, $frequency)
    {
        return $query->where('pay_frequency', $frequency);
    }
}
