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
 public function status(){
     return $this->belongsTo(Status::class);
 }
 public function payment_status(){
     return $this->belongsTo(Payment_Status::class);
 }

}
?>
