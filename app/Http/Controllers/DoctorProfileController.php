<?php

namespace App\Http\Controllers;

use App\Models\Appointments;
use App\Models\DoctorProfile;
use App\Providers\AppServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorProfileController extends Controller
{
    public function index() {
        return view("dashboard", [
            "data" => DoctorProfile::latest()->paginate()
        ]);
    }
    public function show($id) {
       
        return view("components.profile", [
            "data" =>DoctorProfile::find($id)
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

       return redirect("/doctors");
    }
}
