<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'employee_id',
        'course_name',
        'place',
        'start_date',
        'expiry_date',
        // 'details'
    ];

    public function EmployeeCourse()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }
}
