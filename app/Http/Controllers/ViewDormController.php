<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewDorm extends Controller
{
    public function viewDorm(Request $request)
    {
        // Fetch student's details and dorm information from the database
        $student = auth()->user(); // Assuming the authenticated user is a student
        $friends = $student->friends; // Assuming 'friends' is a relationship on the student model
        $block = $student->dorm->block; // Assuming 'dorm' is a relationship on the student model
        $roomNumber = $student->dorm->room_number;
    
        // Return the view with the data
        return view('student.viewDorm', compact('student', 'friends', 'block', 'roomNumber'));
    }

    }