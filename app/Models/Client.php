<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'name',
        'email',
        'dob',
        'phone',
        'address'
    ];

    protected $casts = [
        'dob' => 'date',
        'pivot.enrollment_date' => 'datetime'
    ];

    public function healthPrograms()
    {
        return $this->belongsToMany(HealthProgram::class)->withPivot('enrollment_date');
    }
    
}
