<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DirectorReport;

class DirectorReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pmReports = DirectorReport::all();

        return view('proctor Director.directorReportDisplay', compact('pmReports'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('proctor Director.reports');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validate the form data
    $validatedData = $request->validate([
        'numStudentsAccepted' => 'required|numeric',
        'numStudentsAllocated' => 'required|numeric',
        'numStudentClearanced' => 'required|numeric',
      
        'numFreeDorms' => 'required|numeric',
    ]);

    // Create a new PM Report record
    $pmReport = new DirectorReport();
    $pmReport->numStudentsAccepted = $validatedData['numStudentsAccepted'];
    $pmReport->numStudentsAllocated = $validatedData['numStudentsAllocated'];
    $pmReport->numStudentClearanced = $validatedData['numStudentClearanced'];

    $pmReport->numFreeDorms = $validatedData['numFreeDorms'];

    // Save the PM Report record
    $pmReport->save();

    // Redirect the user after successful form submission
    return redirect()->route('directorReport.index')->with('success', 'PM report created successfully.');
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
    public function edit($id)
    {
        $pmReport = DirectorReport::findOrFail($id);
        return view('proctor Director.directorReportEdit', compact('pmReport'));
    }
    
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'numStudentsAccepted' => 'required|numeric',
            'numStudentsAllocated' => 'required|numeric',
            'numStudentClearanced' => 'required|numeric',
           
            'numFreeDorms' => 'required|numeric',
        ]);
    
        $pmReport = DirectorReport::findOrFail($id);
        $pmReport->update($validatedData);
    
        return redirect()->route('directorReport.index')->with('success', 'PM report updated successfully.');
    }
    
    public function destroy($id)
    {
        $pmReport = DirectorReport::findOrFail($id);
        $pmReport->delete();
    
        return redirect()->route('directorReport.index')->with('success', 'PM report deleted successfully.');
    }

    public function indexx()
    {
        $pmReports = DirectorReport::all();

        return view('Registrar.DirectorReport', compact('pmReports'));
    }
}
