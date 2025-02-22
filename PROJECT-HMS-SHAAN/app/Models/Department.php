<?php

namespace App\Models;

use App\Models\Doctors\Doctor;
use Illuminate\Database\Eloquent\Model;
class Department extends Model{

    public function doctors(){
        return $this->hasMany(Doctor::class);
    }

}
?>
