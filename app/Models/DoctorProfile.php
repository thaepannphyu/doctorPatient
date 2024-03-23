<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorProfile extends Model
{
    use HasFactory;
    protected $guarded= [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function patients()
    {
        return $this->belongsToMany(User::class, 'appointments', 'doctor_id', 'patient_id')
        ->withPivot('symptoms', 'date')
        ->withTimestamps();
    }

    
}
