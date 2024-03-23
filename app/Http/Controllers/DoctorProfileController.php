<?php

namespace App\Http\Controllers;

use App\Models\Appointments;
use App\Models\DoctorProfile;
use App\Models\User;
use App\Providers\AppServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class DoctorProfileController extends Controller
{
    public function index() {
       
        // User::latest()->role("patient")->whereHas("patients",function($query){
        //     $query->where("doctor_id",Auth::user()->id);
        // })->paginate()
        return view("dashboard", [
            "data" => User::latest()->role("patient")->whereHas("patients",function($query){
                    $query->where("doctor_id",Auth::user()->id);
                })->paginate()
        ]);
    }

    public function show($id) {
       
        return view("components.profile", [
            "data" =>DoctorProfile::findorFail($id)
        ]);
    }
    public function create($id) {
       
        return view("appointment.create",[
            "data" =>DoctorProfile::find($id)
        ]);
    }

    public function store(Request $request) {
    
     // Validate the incoming request data
    $request->validate([
        'doctor_id' => 'required',
        'patient_id' => 'required',
        'date' => 'required|date',
    ]);


       // Find the doctor
       $doctor = DoctorProfile::findOrFail($request->doctor_id);

       // Attach the patient to the doctor
       $doctor->patients()->attach($request->patient_id, ['date' => $request->date]);

       $user= User::findOrFail($request->patient_id);
       Role::create(['name' => 'patient']);
       $user->assignRole('patient');

       return redirect("/doctors");
    }
}
