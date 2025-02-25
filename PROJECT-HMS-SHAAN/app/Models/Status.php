<?php

namespace App\Models;

use App\Models\Doctors\Doctor;
use Illuminate\Database\Eloquent\Model;
class Status extends Model{

    protected $table = 'statuss';

    public function doctor()
    {
        return $this->hasMany(Doctor::class);
    }

    public function appointment()
    {
        return $this->hasMany(Appointment::class);
    }
    public function trashappointments() {
        return $this->hasMany(AppointmentTrashed::class);
    }
    public function consultation() {
        return $this->hasMany(Consultation::class);
    }
    public function consultationlabtest() {
        return $this->hasMany(ConsultationLabTest::class);
    }
    public function labtest() {
        return $this->hasMany(LabTest::class);
    }
    public function labtestcategory() {
        return $this->hasMany(LabTestCategory::class);
    }
}
?>
