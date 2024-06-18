<?php


namespace App\Http\Controllers;

use App\Models\Emergency;
use Illuminate\Http\Request;

class EmergencyController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = session('user');

        // Validate the request data
        $validatedData = $request->validate([
            'student_name' => 'required|string',
            'request_type' => 'required|string',
            'description' => 'required|string',
            'contact_phone' => 'required|string',
            'urgency_level' => 'required|string',
            'supporting_media' => 'required|file',
            'location_of_emergency' => 'required|string',
            'building_name' => 'required|string',
            'room_number' => 'nullable|string',
            'other_location' => 'nullable|string',
        ]);

        $validatedData['student_id'] = $user->student_id;

        // Create a new emergency record
        $emergency = Emergency::create($validatedData);

        return redirect()->route('emergencies.index')->with('success', 'Emergency request created successfully.');
    }

    public function index()
    {

        $user = session('user');
        $studentId = $user->student_id;
        $emergencies = Emergency::where('student_id', $studentId)->get();
        
        return view('students.emergencyDisplay', compact('emergencies'));;
    }

    public function emergency()
    {
        
        $emergencies = Emergency::all();
     
        return view('proctor.emergencyResponse', compact('emergencies'));
    }


    public function edit($id)
{
    $emergency = Emergency::findOrFail($id);
    return view('students.emergencyEdit', compact('emergency'));
}

public function update(Request $request, $id)
{
    $emergency =Emergency::findOrFail($id);
    $emergency->update($request->all());
    return redirect()->route('emergencies.index')->with('success', 'Lost and found request updated successfully.');
}

}