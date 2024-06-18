<?php

namespace App\Http\Controllers;

use App\Models\PMreport;
use Illuminate\Http\Request;

class PMreportController extends Controller
{
    public function index()
    {
        $pmReports = PMreport::all();

        return view('proctor Manager.PMreportDisplay', compact('pmReports'));
    }

    public function indexx()
    {
        $pmReports = PMreport::all();

        return view('Dean Of Student.PMreportss', compact('pmReports'));
    }


    public function create()
    {
        return view('proctor Manager.PMreport');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'numStudents' => 'required|integer',
            'numCases' => 'required|integer',
            'numMaintenances' => 'required|integer',
            'numSevereMaintenances' => 'required|integer',
            'numDormsCleaning' => 'required|integer',
        ]);

       
        $pmReport = new PMreport();
        $pmReport->numStudents = $validatedData['numStudents'];
        $pmReport->numCases = $validatedData['numCases'];
        $pmReport->numMaintenances = $validatedData['numMaintenances'];
        $pmReport->numSevereMaintenances = $validatedData['numSevereMaintenances'];
        $pmReport->numDormsCleaning = $validatedData['numDormsCleaning'];
        $pmReport->save();

        return redirect()->route('pmreports.index')->with('success', 'PM report created successfully.');
    }

    public function show(PMreport $pmreport)
    {
        return view('pmreports.show', compact('pmreport'));
    }

    public function edit($id)
    {

        $pmReport = PMreport::findOrFail($id);
        return view('proctor Manager.PMreportEdit', ['pmReport' => $pmReport]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'numStudents' => 'required|integer',
            'numCases' => 'required|integer',
            'numMaintenances' => 'required|integer',
            'numDormsCleaning' => 'required|integer',
            // Add validation rules for other attributes
        ]);
    
        $pmReport = PMreport::findOrFail($id);
        $pmReport->update($validatedData);
    
        return redirect()->route('pmreports.index')->with('success', 'PM report updated successfully.');
    }

    public function destroy(PMreport $pmreport)
    {
        $pmreport->delete();

        return redirect()->route('pmreports.index')->with('success', 'PM report deleted successfully.');
    }
}