<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsultationLabTest extends Model
{

    use HasFactory;

    protected $fillable = [
        'consultation_id',
        'lab_test_id',
        'lab_test_result',
    ];
    public function consultation()
    {
        return $this->belongsTo(Consultation::class);
    }
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
    public function labTests()
    {
        return $this->belongsTo(LabTest::class);
    }
}
