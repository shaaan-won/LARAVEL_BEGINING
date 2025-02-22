<?php

namespace App\Models\Patient;

use App\Models\Appointment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $table = 'patients';

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
