<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeanReports;

class DeanReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
        public function index()
        {
            $pmReports = DeanReports::all();
    
            return view('Dean Of Student.deanReportDisplay', compact('pmReports'));
        }
    

        public function indexx()
    {
        $pmReports = DeanReports::all();

        return view('proctor Director.deanreportss', compact('pmReports'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Dean Of Student.reports');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validate the form data
    $validatedData = $request->validate([
        'numStudentsAllocated' => 'required|numeric',
        'numStudentClearanced' => 'required|numeric',
        'numMaintenances' => 'required|numeric',
        'numSevereMaintenances' => 'required|numeric',
        'DormsCleaning' => 'required|string',
        'statusOfservices' => 'required|string',
        'numFreeDorms' => 'required|numeric',
    ]);

    // Create a new PM Report record
    $pmReport = new DeanReports();
    $pmReport->numStudentsAllocated = $validatedData['numStudentsAllocated'];
    $pmReport->numStudentClearanced = $validatedData['numStudentClearanced'];
    $pmReport->numMaintenances = $validatedData['numMaintenances'];
    $pmReport->numSevereMaintenances = $validatedData['numSevereMaintenances'];
    $pmReport->DormsCleaning = $validatedData['DormsCleaning'];
    $pmReport->statusOfservices = $validatedData['statusOfservices'];
    $pmReport->numFreeDorms = $validatedData['numFreeDorms'];

    // Save the PM Report record
    $pmReport->save();

    // Redirect the user after successful form submission
    return redirect()->route('deanReport.index')->with('success', 'PM report created successfully.');
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
        $pmReport = DeanReports::findOrFail($id);
        return view('Dean Of Student.deanReportEdit', compact('pmReport'));
    }
    
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'numStudentsAllocated' => 'required|numeric',
            'numStudentClearanced' => 'required|numeric',
            'numMaintenances' => 'required|numeric',
            'numSevereMaintenances' => 'required|numeric',
            'DormsCleaning' => 'required|string',
            'statusOfservices' => 'required|string',
            'numFreeDorms' => 'required|numeric',
        ]);
    
        $pmReport = DeanReports::findOrFail($id);
        $pmReport->update($validatedData);
    
        return redirect()->route('deanReport.index')->with('success', 'PM report updated successfully.');
    }
    
    public function destroy($id)
    {
        $pmReport = DeanReports::findOrFail($id);
        $pmReport->delete();
    
        return redirect()->route('deanReport.index')->with('success', 'PM report deleted successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    
}
