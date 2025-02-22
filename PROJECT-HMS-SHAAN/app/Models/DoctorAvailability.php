<?php

namespace App\Models;

use App\Models\Doctors\Doctor;
use Illuminate\Database\Eloquent\Model;
class DoctorAvailability extends Model{


    public function doctor(){
		return $this->belongsTo(Doctor::class);
	}

}
?>
