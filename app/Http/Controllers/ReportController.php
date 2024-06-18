<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use Illuminate\Validation\Rule;

class ReportController extends Controller
{
    
    public function store(Request $request)
    {
        try {
            // Validate the form data
            $validatedData = $request->validate([
                'reportId' => 'required|unique:reports',
                'resourceExist' => 'required|integer|min:0',
        'numCases' => 'required|integer|min:0',
        'numDamages' => 'required|integer|min:0',
            ]);
    
            // Rest of the code...
    
            // Create a new report instance
            $report = new Report();
            $report->reportId = $validatedData['reportId'];
            $report->resourceExist = $validatedData['resourceExist'];
            $report->numCases = $validatedData['numCases'];
            $report->numDamages = $validatedData['numDamages'];
            $report->save();
    
            // Optionally, you can redirect the user to a success page or perform any additional actions
            return redirect()->route('reports.index')->with('success', 'Block created successfully');
            
        } catch (\Illuminate\Database\QueryException $e) {
            // Check if the error is related to a duplicate primary key
            if ($e->getCode() == 23000 && strpos($e->getMessage(), 'Duplicate entry') !== false) {
                // Redirect back with error message for duplicate entry
                return redirect()->back()->withInput()->withErrors(['reportId' => 'Report ID already exists. Please choose a different ID.']);
            } else {
                // Redirect back with generic error message for other database errors
                return redirect()->back()->withInput()->withErrors(['error' => 'An error occurred while creating the report.']);
            }
        }
    }
    public function index()
    {
        $reports = Report::all();

        return view('proctor.reportDisplay', compact('reports'));
    }

    
    public function indexx()
    {
        $reports = Report::all();

        return view('proctor Manager.reports', compact('reports'));
    }

    public function edit($reportid)
    {
        $report = Report::where('reportid', $reportid)->first();

        return view('proctor.reportEdit', compact('report'));
    }

    public function update(Request $request, $reportid)
    {
        $report = Report::where('reportid', $reportid)->first();

        $report->resourceExist = $request->input('resourceExist');
        $report->numCases = $request->input('numCases');
        $report->numDamages = $request->input('numDamages');

        $report->save();

        return redirect()->route('reports.index')->with('success', 'Report updated successfully');
    }

    public function destroy($reportid)
    {
        $report = Report::where('reportid', $reportid)->first();

        if (!$report) {
            return redirect()->route('reports.index')->with('error', 'Report not found');
        }

        $report->delete();

        return redirect()->route('reports.index')->with('success', 'Report deleted successfully');
    }

}

