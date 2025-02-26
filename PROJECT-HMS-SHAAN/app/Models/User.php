<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Doctors\Doctor;
use App\Models\Patient\Patient;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function isSuperAdmin()
    {
        return $this->role_id == 1;
    }
    public function isAdmin()
    {
        return $this->role_id == 2;
    }
    public function isDoctor()
    {
        return $this->role_id == 3;
    }
    public function isPatient()
    {
        return $this->role_id == 4;
    }
    public function isReceptionist()
    {
        return $this->role_id == 5;
    }
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public function hasRole($role)
    {
        return $this->role === $role; // Assuming you have a 'role' column in your users table
    }
    public function doctor()
    {
        return $this->hasMany(Doctor::class);
    }
    public function patient()
    {
        return $this->hasMany(Patient::class);
    }
    // public function created_by(){
    //     return $this->hasMany(User::class);
    // }
    // public function updated_by(){
    //     return $this->hasMany(User::class);
    // }
}
