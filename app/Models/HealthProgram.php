<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HealthProgram extends Model
{
    //
    Protected $fillable = [
        'name',
        'description'
    ];

    public function clients()
    {
        return $this->belongsToMany(Client::class)->withPivot('enrollment_date');
    }
}
