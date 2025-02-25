<?php

namespace App\Models;

use App\Models\Doctors\Doctor;
use App\Models\Patient\Patient;
use Illuminate\Database\Eloquent\Model;
class AppointmentTrashed extends Model{
    public function doctor() {
        return $this->belongsTo(Doctor::class);
    }
    public function patient() {
        return $this->belongsTo(Patient::class);
    }
    public function status() {
        return $this->belongsTo(Status::class);
    }


}
?>
