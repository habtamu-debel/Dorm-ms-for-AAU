<?php

namespace App\Http\Controllers;

use App\Models\DormChange;
use Illuminate\Http\Request;

class DormChangeController extends Controller
{
    /**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */
public function index()
{
    $user = session('user');
    $studentId = $user->student_id;

    $dormChanges = DormChange::where('student_id', $studentId)->get();

    return view('students.dormChangeDisplay', compact('dormChanges'));
}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dorm-changes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
   
        $user = session('user');
    
        $validatedData = $request->validate([
           
            'student_name' => 'required|string',
            'current_dorm_duration' => 'required|string',
            'reason' => 'required|string',
            'description' => 'required|string',
            'room_number_features' => 'required|string',
            'special_needs' => 'nullable|string',
            'supporting_file' => 'nullable|file',
            'date_of_submission' => 'required|date',
            'contact_details' => 'required|string',
        ]);
    
        $validatedData['student_id'] = $user->student_id;
    
        $dormChange = DormChange::create($validatedData);
        $dormChange->save();
    
        return redirect()->route('dorm-changes.index')->with('success', 'Dorm change request created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DormChange  $dormChange
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DormChange  $dormChange
     * @return \Illuminate\Http\Response
     */
   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DormChange  $dormChange
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Retrieve the authenticated user from the session
        $user = session('user');
    
        // Find the dorm change request based on the provided $id
        $dormChange = DormChange::findOrFail($id);
    
        // Validate the request data
        $validatedData = $request->validate([
           
            'student_name' => 'required|string',
            'current_dorm_duration' => 'required|integer',
            'reason' => 'required|string',
            'description' => 'required|string',
            'room_number_features' => 'required|string',
            'special_needs' => 'nullable|string',
            'supporting_file' => 'nullable|file',
            'date_of_submission' => 'required|date',
            'contact_details' => 'required|string',
        ]);
    
        // Update the authenticated user's student_id in the validated data
        $validatedData['student_id'] = $user->student_id;
    
        // Update the dorm change request with the validated data
        $dormChange->update($validatedData);
    
        // Save the updated dorm change request
        $dormChange->save();
    
        // Redirect the user back to the dorm changes index with a success message
        return redirect()->route('dorm-changes.index')->with('success', 'Dorm change request updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DormChange  $dormChange
     * @return \Illuminate\Http\Response
     */
   

    public function edit($id)
{
    $dormChange = DormChange::findOrFail($id);
    return view('students.dormChangeEdit', compact('dormChange'));
}

public function destroy(DormChange $dormChange)
{
    $dormChange->delete();
    return redirect()->route('dorm-changes.index')->with('success', 'Dorm change request deleted successfully.');
}


public function dormChange()
{
    $dormChanges = DormChange::all();
    return view('proctor.dormChangeResponse', compact('dormChanges'));
}
}