<?php

namespace App\Models\Hospital_List;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HospitalList extends Model
{
    use HasFactory;

    protected $table = 'hospitals';

    // protected $fillable = [
    //     'name',
    //     'address',
    //     'phone',
    //     'email',
    //     'website',
    // ];
}
