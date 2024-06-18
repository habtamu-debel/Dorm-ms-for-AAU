<?php

namespace App\Http\Controllers;

use App\Models\Clearance;
use Illuminate\Http\Request;

class ClearanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clearances = Clearance::all();
        return view('students.clearanceDisplay', compact('clearances'));
    }

    public function clearance()
    {
        $clearances = Clearance::all();
        return view('proctor.clearanceResponse', compact('clearances'));
    }

    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clearances.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'student_name' => 'required|string|regex:/^[a-zA-Z\s]+$/',
            'department' => 'required|string|regex:/^[a-zA-Z\s]+$/',
            'reason' => 'required|string|regex:/^[a-zA-Z\s]+$/',
            'supporting_documents' => 'nullable|file',
            'contact_details' => 'required',
        ]);

        $clearance = new Clearance();
        $user = session('user');
        $clearance->student_id = $user->student_id;
        $clearance->student_name = $validatedData['student_name'];
        $clearance->department = $validatedData['department'];
        $clearance->reason = $validatedData['reason'];

        if ($request->hasFile('supporting_documents')) {
            $validatedData['supporting_documents'] = $request->file('supporting_documents')->store('clearance_documents', 'public');
            $clearance->supporting_documents = $validatedData['supporting_documents'];
        }
        $clearance->contact_details = $validatedData['contact_details'];

        $clearance->save();

        return redirect()->route('clearances.index')->with('success', 'Clearance request created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $clearance = Clearance::findOrFail($id);
        return view('students.clearanceEdit', compact('clearance'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $clearance = Clearance::findOrFail($id);
        

        $validatedData = $request->validate([
            'student_name' => 'required|string|regex:/^[a-zA-Z\s]+$/',
            'department' => 'required|string|regex:/^[a-zA-Z\s]+$/',
            'reason' => 'required|string|regex:/^[a-zA-Z\s]+$/',
            'supporting_documents' => 'nullable|file',
            'contact_details' => 'required',
        ]);
       
        $clearance->student_name = $validatedData['student_name'];
        $clearance->department = $validatedData['department'];
        $clearance->reason = $validatedData['reason'];
        $clearance->contact_details = $validatedData['contact_details'];

        if ($request->hasFile('supporting_documents')) {
            $validatedData['supporting_documents'] = $request->file('supporting_documents')->store('clearance_documents', 'public');
            $clearance->supporting_documents = $validatedData['supporting_documents'];
        }

        $clearance->save();

        return redirect()->route('clearances.index')->with('success', 'Clearance request updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $clearance = Clearance::findOrFail($id);
        $clearance->delete();

        return redirect()->route('clearances.index')->with('success', 'Clearance request deleted successfully.');
    }


    public function showResponse($id)
{
    $clearance = Clearance::find($id);
    return view('proctor.clearanceShowResponse', ['clearance' => $clearance]);
}

public function submitResponse(Request $request, $id)
{
    // Validate the form input
    $validatedData = $request->validate([
        'response' => 'required',
    ]);

    // Find the RoomMaintenance record
    $clearance = Clearance::find($id);

    // Update the response attribute
    $clearance ->response = $validatedData['response'];
    $clearance ->save();

    // Redirect back to the room maintenance list or show success message
    return redirect()->action([ClearanceController::class, 'clearance'])->with('success', 'Maintenance request deleted successfully!');
}
}