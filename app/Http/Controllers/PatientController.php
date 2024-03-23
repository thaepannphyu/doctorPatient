<?php

namespace App\Http\Controllers;

use App\Models\DoctorProfile;
use App\Models\User;
use Doctrine\Inflector\Rules\English\Rules;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;

class PatientController extends Controller
{
    public function index() {
        return view("dashboard",[
            "data"=>User::latest()->role("user")->paginate()
        ]);
    }

    public function show(User $user) {
       
      
        return view("dashboard",[
            "data"=>[$user]
        ]);
    }

    public function assign(Request $request,User $user) {
      
        if($request["role"]="doctor"){
            
            $user->assignRole("doctor");
            DoctorProfile::create([
                'user_id' => $user->id,
            ]);
            
        }
        
        if($request["role"]="admin"){
            $user->assignRole("admin");
        }
              
        return redirect()->back();
    }

}
