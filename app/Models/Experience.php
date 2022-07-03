<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Experience extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'employee_id',
        'work_place',
        'job_title',
        'salary',
        'currency',
        'start_date',
        'expiry_date',
        // 'details'
    ];

    public function EmployeeExperience()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }
}
