<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public function  scopeRole(Builder $query, $roles, $guard = null, $without = false)
    {

        //making it countable
        if (!is_array($roles)) {
            $roles = [$roles];
        }
    
        
      return $query->whereHas("roles",function ($roleQuery) use($roles) {
        $roleQuery->whereIn('name', $roles);
       });
    }
   
    public function doctorProfile()
    {
        return $this->hasOne(DoctorProfile::class);
    }

    public function patients()
    {
        return $this->belongsToMany(User::class, 'appointments',  'patient_id','doctor_id')
        ->withPivot('symptoms', 'date')
        ->withTimestamps();
    }

    
    
}
