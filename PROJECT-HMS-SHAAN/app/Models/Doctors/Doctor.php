<?php

namespace App\Models\Doctors;

use App\Models\Appointment;
use App\Models\Department;
use App\Models\DoctorAvailability;
use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $table = "doctors";

    public function department() {
        return $this->belongsTo(Department::class);
    }
    public function status() {
        return $this->belongsTo(Status::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function doctor_availability() {
        return $this->hasMany(DoctorAvailability::class);
    }
    public function appointments() {
        return $this->hasMany(Appointment::class);
    }

}
