<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConsultationLabTest extends Model
{

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
    // public function consultation(){
    //     return $this->belongsTo(Consultation::class);
    // }
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
    public function labtest()
    {
        return $this->belongsTo(LabTest::class, 'lab_test_id');
    }
}
