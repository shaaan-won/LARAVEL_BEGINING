<?php
namespace App\Models;

use App\Models\Doctors\Doctor;
use App\Models\Patient\Patient;
use Illuminate\Database\Eloquent\Model;
class Appointment extends Model{

    public function patient(){
        return $this->belongsTo(Patient::class);
    }

    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }

    public function doctor_availability(){
        return $this->belongsTo(DoctorAvailability::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function status(){
        return $this->belongsTo(Status::class);
    }
}
?>
