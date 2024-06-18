<?php

namespace App\Http\Controllers;

use App\Models\SpecialAccommodation;
use App\Models\Student;
use Illuminate\Http\Request;

class SpecialAccommodationController extends Controller
{
    /**
     * Store a newly created special accommodation.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = session('user');
    
        $validatedData = $request->validate([
            'reason' => 'required|string',
            'medical_documentation' => 'nullable|file',
            'preferred_accommodation' => 'required|string',
            'supporting_information' => 'nullable|string',
            'contact_details' => 'required|string',
        ]);
    
        if ($request->hasFile('medical_documentation')) {
            $file = $request->file('medical_documentation');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('medical_documentation', $fileName, 'public');
            $validatedData['medical_documentation'] = $filePath;
        }
    
        $validatedData['student_id'] = $user->student_id;
        $accommodation = SpecialAccommodation::create($validatedData);
    
        return redirect()->route('accommodation.index')->with('success', 'Dorm change request created successfully.');
    }

    public function index()
    {

        $user = session('user');
        $studentId = $user->student_id;
        $accommodations = SpecialAccommodation::where('student_id', $studentId)->get();
        
        return view('students.specialAccommodationDisplay', compact('accommodations'));;
    }

    public function specialAccommodate()
  {     
        $accommodations = SpecialAccommodation::all();
        return view('proctor.accommodationResponse', compact('accommodations'));
    }




    public function edit($id)
    {
        $accommodation = SpecialAccommodation::findOrFail($id);
        return view('students.specialAccommodationEdit', compact('accommodation'));
    }
    
    public function update(Request $request, $id)
    {
        $accommodation = SpecialAccommodation::findOrFail($id);
        $accommodation->update($request->all());
        return redirect()->route('accommodation.index')->with('success', 'Lost and found request updated successfully.');
    }

    


}