<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Family extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'firstname',
        'secondname',
        'thirdname',
        'fourthname',
        'employee_id',
        'IDnumber',
        'relation',
        'date_of_birth',
        'status',
        'study',
        'work',
        // 'IDimage',
    ];

    public function EmployeeFamily()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }
}
