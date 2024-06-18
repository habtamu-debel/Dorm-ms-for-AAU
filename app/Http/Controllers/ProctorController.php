<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProctorController extends Controller
{
    public function proctorHome($staffid)
    {
        return view('proctor.proctorHome', compact('staffid'));
    }
}
