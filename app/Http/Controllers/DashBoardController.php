<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashBoardController extends Controller
{
   
    public function index() {
        return view("dashboard",[
            "data"=>User::latest()->paginate()
        ]);
    }
    
}
