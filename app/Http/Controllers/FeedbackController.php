<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use Illuminate\Support\Facades\DB;

class FeedbackController extends Controller
{
    public function submit(Request $request)
    {
        // Validate the form input
        $validatedData = $request->validate([
            'comment' => 'required',
        ]);
    
        // Create a new feedback instance
        $feedback = new Feedback();
        $user = session('user');
    
        // Access the student ID or role
      
    
        if ($request->has('use-student-id')) {
            // Assuming you have an authenticated student
            $user = session('user');
            $feedback->student_id = $user->student_id;
        }

        else if ($request->has('use-staff-id')) {
            // Assuming you have an authenticated student
            $user = session('user');
            $feedback->staff_id = $user->staffid;
        }

        else if ($request->has('use-campus')) {
            $user = session('user');
            $feedback->student_id = $user->campus;
        }
        else {
            $feedback->student_id = 000; // Set student ID to null if checkbox is unchecked
        }


          if ($user->role) {
            $feedback->role = $user->role;
        } else {
            $feedback->role = 'student';
        }
    
        $feedback->comment = $validatedData['comment'];
    
        $feedback->save();
    
        // Redirect back or show success message
        return redirect()->route('students.feedbackSuccess')->with('success', 'Feedback created successfully');
    }
   

  
    public function home()
    {
        $feedbackEntries = DB::table('feedback')
            ->where('role', 'student')
            ->get();
    
        return view('proctor.feedbackDisplay', compact('feedbackEntries'));
    }

    public function PMhome()
    {
        $feedbackEntries = DB::table('feedback')
            ->where('role', 'proctor')
            ->get();
    
        return view('proctor Manager.proctorFeedbackDisplay',  compact('feedbackEntries'));
       
    }

    public function Registrarhome()
    {
        $feedbackEntries = DB::table('feedback')
            ->where('role', 'Dean of Students')
            ->get();
    
            return view('proctor Director.feedbackDisplay',  compact('feedbackEntries'));
       
    }

    public function show()
    {
    
    
        return view('students.feedback');
    }



   
}