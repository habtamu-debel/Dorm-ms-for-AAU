<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AllocateController extends Controller
{
    public function index()
    {
        // Add any necessary logic or data retrieval here

        return view('roomRegister'); // Replace 'allocate' with your actual allocate view file name
    }
}