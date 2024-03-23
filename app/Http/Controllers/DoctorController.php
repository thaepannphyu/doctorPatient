<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index() {
        return view("dashboard",[
            "data"=>User::latest()->role("doctor")->paginate()
        ]);
    }
}
