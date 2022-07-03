<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'firstname',
        'secondname',
        'thirdname',
        'fourthname',
        'IDnumber',
        'job_number',
        'specialty',
        'status',
        'gender',
        'phone',
        'telephone',
        'email',
        'hiring_date',
        'date_of_birth',
        'address',
        'personal_image',
        'IDimage',
    ];

    public function degrees()
    {
        return $this->hasMany(UniversityDegree::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function experiences()
    {
        return $this->hasMany(Experience::class);
    }

    public function families()
    {
        return $this->hasMany(Family::class);
    }
}
