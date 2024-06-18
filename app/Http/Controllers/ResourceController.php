<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resource;

class ResourceController extends Controller
{
    public function create()
    {
        return view('students.resourceExit');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'student_first_name' => 'required|string',
            'student_last_name' => 'required|string',
            
            'year' => 'required|string',
            'department' => 'required|string',
            'items_exit' => 'required|string',
            'date_of_submission' => 'required|date',
        ]);

        $resource = new Resource();
        $user = session('user');
$resource->student_id = $user->student_id;

        $resource->student_first_name = $validatedData['student_first_name'];
        $resource->student_last_name = $validatedData['student_last_name'];
       
        $resource->year = $validatedData['year'];
        $resource->department = $validatedData['department'];
        $resource->items_exit = $validatedData['items_exit'];
        $resource->date_of_submission = $validatedData['date_of_submission'];
        $resource->save();

        return redirect()->route('resource-exit.show')->with('success', 'Resource exit form submitted successfully.');
    }


    public function show()
{
    $resources = Resource::all();

    return view('students.resource-exit-display', compact('resources'));
    
}

public function home()
{
    $resources = Resource::all();

    return view('proctor.resourceExit', compact('resources'));
    
}


public function updateConfirmation(Request $request, $id)
{
    $resource = Resource::findOrFail($id);
    $confirmation = $request->input('confirmation');

    // Validate the status input, ensuring it is one of the allowed values
  

    // Update the status of the room maintenance request
    $resource->confirmation = $confirmation;
    $resource->save();

    // Redirect back to the room maintenance request details page or show a success message
    return redirect()->action([ResourceController::class, 'home'])->with('success', 'Maintenance request deleted successfully!');
}

public function confirm($id)
{
    $resource = Resource::findOrFail($id);
    
    return view('proctor.updateConfirmation', compact('resource'));
}

}