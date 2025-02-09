<?php

namespace App\Models\Doctors;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorList extends Model
{
    use HasFactory;

    protected $table = "hms_doctors";
}
