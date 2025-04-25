<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HealthProgram extends Model
{
    //
    public function clients()
    {
        return $this->belongsToMany(Client::class)->withPivot('enrollment_date');
    }
}
