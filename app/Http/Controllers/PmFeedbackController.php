<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PmFeedback;
use Illuminate\Support\Facades\DB;

class PmFeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'comment' => 'required',
        ]);

        // Create a new feedback instance
        $pmfeedback = new PmFeedback();
        $user = session('user');

        // Access the student ID
      
        // Assuming you have an authenticated student
        $pmfeedback->staff_id = $user->staffid;; 
        $pmfeedback->comment = $validatedData['comment'];

        if ($request->has('use-staff-id')) {
            // Assuming you have an authenticated student
            $user = session('user');
            $pmfeedback->staff_id = $user->staffid;
        }
        else {
            $pmfeedback->staff_id = 000; // Set student ID to null if checkbox is unchecked
        }
        $pmfeedback->save();

        // Redirect back or show success message
        return redirect()->route('students.feedbackSuccess')->with('success', 'Block created successfully');
    }


    public function show()
    {

        return view('proctor.feedbackProctor');
    }


    public function home()
    {
    
        $pmfeedbackEntries = DB::table('pmfeedbacks')->get();

        return view('proctor Manager.proctorFeedbackDisplay', compact('pmfeedbackEntries'));
    }
    /**
     * Display the specified resource.
     */
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
