<?php

namespace App\Models;

use App\Models\Patient\Patient;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{

    use HasFactory;

    protected $fillable = [
        'appointment_id',
        'symptoms',
        'diagnosis',
        'prescription',
        'consultation_notes',
    ];
    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }

    // Define the relationship with Patient through Appointment
    // public function patient()
    // {
    //     return $this->appointment->belongsTo(Patient::class);
    // }
    public function patient()
    {
        return $this->hasOneThrough(Patient::class, Appointment::class, 'id', 'id', 'appointment_id', 'patient_id');
    }
    public function labTests()
    {
        return $this->hasMany(ConsultationLabTest::class);
    }
}
