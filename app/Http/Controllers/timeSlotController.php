<?php

namespace App\Http\Controllers;

use App\Models\TimeSlot;
use Illuminate\Http\Request;

class timeSlotController extends Controller
{
    public function store(Request $request)
    {
        // Validate request data
        $request->viladate( [
            'doctor_id' => 'required|exists:doctors,id',
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i:s',
            'duration' => 'required|integer|min:1', // duration in minutes
        ]);

        

        // Create a new time slot
        TimeSlot::create([
            'doctor_id' =>$request->doctor_id,
            'date'=>$request->date,
            'start_time'=>$request->start_time,
            'end_time'=>date('H:i:s', strtotime($request->start_time . ' + ' . $request->duration . ' minutes')),
            'duration'=> $request->duration
        ]);
       

        return response()->json(['message' => 'Time slot created successfully'], 201);
    }
}
