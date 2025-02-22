<?php

namespace App\Models\Doctors;

use App\Models\DoctorAvailability;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $table = "doctors";

    public function doctor_availability() {
        return $this->hasMany(DoctorAvailability::class);
    }
}
