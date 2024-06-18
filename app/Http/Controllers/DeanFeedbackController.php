<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\DeanFeedback;
use Illuminate\Support\Facades\DB;

class DeanFeedbackController extends Controller
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
    
        $feedback = new DeanFeedback();
        $feedback->comment = $validatedData['comment'];
       
       
        
        if ($request->has('use-campus')) {
            $user = session('user');
            $feedback->campus = $user->campus;
        }

        else {
            $feedback->campus = 000; // Set student ID to null if checkbox is unchecked
        }
        
        $feedback->save();
    
        return redirect()->route('Dean Of Student.feedbackSuccess')->with('success', 'Feedback submitted successfully.');
    }


    public function home()
    {
    
        $pmfeedbackEntries = DB::table('dean_feedbacks')->get();

        return view('proctor Director.feedbackDisplay', compact('pmfeedbackEntries'));
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

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
