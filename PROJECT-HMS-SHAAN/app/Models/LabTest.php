<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LabTest extends Model
{

    public function category()
    {
        return $this->belongsTo(LabTestCategory::class);
    }
    public function status()
    {
        return $this->belongsTo(Status::class);
    }
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
    public function labtest(){
        return $this->hasMany(ConsultationLabTest::class , 'lab_test_id');
    }
}
