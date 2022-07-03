<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UniversityDegree extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'employee_id',
        'qualification',
        'specialty',
        'University',
        'specialty_date',
        // 'details'
    ];

    public function EmployeeDegree()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }
}
