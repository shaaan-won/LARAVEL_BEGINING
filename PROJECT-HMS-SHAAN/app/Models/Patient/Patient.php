<?php

namespace App\Models\Patient;

use App\Models\Appointment;
use App\Models\AppointmentTrashed;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $table = 'patients';
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'gender',
        'contact_number',
        'address',
    ];

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function trashappointments() {
        return $this->hasMany(AppointmentTrashed::class);
    }
}
