<?php

namespace App\Http\Controllers;
use App\Models\Students;
use Illuminate\Http\Request;
use App\Models\ProDirector;
 // Import the Student model

class ProDirectorController extends Controller
{
   

    public function index()
    {
        $students = Student::all(); // Replace Student with your actual model name

        return view('students', compact('students'));
    }

    public function sendStudents(Request $request)
    {
        // Process the received data and send the students
        $selectedStudents = $request->input('selectedStudents');
        // Implement your logic to send the selected students

        return response()->json(['message' => 'Students sent successfully'], 200);
    }
}
