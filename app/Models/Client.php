<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'name',
        'email',
        'dob',
        'phone'

    ];

    public function healthPrograms()
    {
        return $this->belongsToMany(HealthProgram::class)->withPivot('enrollment_date');
    }
}
