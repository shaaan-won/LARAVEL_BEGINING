<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class LabTestCategory extends Model{

    public function category(){
        return $this->hasMany(LabTest::class);
    }
    public function status(){
        return $this->belongsTo(Status::class);
    }

}
?>
