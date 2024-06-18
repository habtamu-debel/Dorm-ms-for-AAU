<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomMaintenance;
use App\Models\Student;
use Carbon\Carbon;



class RoomMaintenanceController extends Controller
{
    public function create()
    {
        return view('room-maintenance.create');
    }

    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'room-number' => 'required',
            'maintenance-type' => 'required',
            'urgency' => 'required',
            'attachment' => 'nullable|file|max:5000',
            'date' => 'required',
            'description' => 'required',
            'contact' => 'required',
            'attachment' => 'required',

        ]);


        
$roomMaintenance = new RoomMaintenance();
$user = session('user');
$roomMaintenance->student_id = $user->student_id;
$roomMaintenance->room_number = $validatedData['room-number'];
$roomMaintenance->maintenance_type = $validatedData['maintenance-type'];
$roomMaintenance->urgency = $validatedData['urgency'];
$roomMaintenance->attachment = $validatedData['attachment'];
$roomMaintenance->date = date('Y-m-d', strtotime($validatedData['date'])); // Convert the date format to 'YYYY-MM-DD'
$roomMaintenance->description = $validatedData['description'];
$roomMaintenance->contact = $validatedData['contact'];
$roomMaintenance->status = 'pending';

$roomMaintenance->save();
 return redirect()->action([RoomMaintenanceController::class, 'index'])->with('success', 'Maintenance request submitted successfully!');
    }
    


    public function index()
    {
        $user = session('user');
        $studentId = $user->student_id;
        
        $roomMaintenances = RoomMaintenance::where('student_id', $studentId)->get();
        
        return view('students.roomMaintenanceMyRequests', compact('roomMaintenances'));
    }

public function edit($id)
{
    $roomMaintenance = RoomMaintenance::findOrFail($id);
    return view('students.roomMaintenanceEdit', compact('roomMaintenance'));
}


public function sendRequest($student_id)
{
    $roomMaintenance = RoomMaintenance::findOrFail($student_id);
    return view('proctor.sendRequest', compact('roomMaintenance'));
}

public function edittt($id)
{
    $roomMaintenance = RoomMaintenance::findOrFail($id);
    return view('students.roomMaintenanceStudentEdit', compact('roomMaintenance'));
}

public function update(Request $request, $id)
{
    $roomMaintenance = RoomMaintenance::findOrFail($id);
    $status = $request->input('status', 'pending');
    $user = session('user');

    // Update the room maintenance data based on the submitted form values
    $roomMaintenance->room_number = $request->input('room_number');
    $roomMaintenance->student_id = $user->student_id;
    $roomMaintenance->maintenance_type = $request->input('maintenance_type');
    $roomMaintenance->urgency = $request->input('urgency');
    $roomMaintenance->contact = $request->input('contact');
   
    $roomMaintenance->attachment = $request->input('attachment');
    $roomMaintenance->status = $status;
  
    // Update other fields as needed

    // Save the updated room maintenance data
    $roomMaintenance->save();

    // Redirect back to the index page or show a success message
    return redirect()->action([RoomMaintenanceController::class, 'showAllRequests'])->with('success', 'Room updated successfully');
}

public function modify(Request $request, $id)
{
    $roomMaintenance = RoomMaintenance::findOrFail($id);
    $status = $request->input('status', 'pending');
    $user = session('user');

    // Update the room maintenance data based on the submitted form values
    $roomMaintenance->room_number = $request->input('room_number');
    $roomMaintenance->student_id = $user->student_id;
    $roomMaintenance->maintenance_type = $request->input('maintenance_type');
    $roomMaintenance->urgency = $request->input('urgency');
    $roomMaintenance->contact = $request->input('contact');
   
    $roomMaintenance->attachment = $request->input('attachment');
    $roomMaintenance->status = $status;
  
    // Update other fields as needed

    // Save the updated room maintenance data
    $roomMaintenance->save();

    // Redirect back to the index page or show a success message
    return redirect()->action([RoomMaintenanceController::class, 'index'])->with('success', 'Room updated successfully');
  
}  

public function showAllRequests()
{
    
    $roomMaintenances = RoomMaintenance::all();
    return view('proctor.allRoomMaintenanceRequests', compact('roomMaintenances'));
}

public function destroy($id)
{
    $roomMaintenance = RoomMaintenance::findOrFail($id);

    // Delete the associated attachment file if it exists
    if ($roomMaintenance->attachment) {
        Storage::delete($roomMaintenance->attachment);
    }

    // Delete the room maintenance record
    $roomMaintenance->delete();

    // Redirect back to the index page or show a success message
    return redirect()->action([RoomMaintenanceController::class, 'showAllRequests'])->with('success', 'Maintenance request deleted successfully!');
}

public function updateStatus(Request $request, $id)
{
    $roomMaintenance = RoomMaintenance::findOrFail($id);
    $status = $request->input('status');

    // Validate the status input, ensuring it is one of the allowed values
    $allowedStatuses = ['pending', 'fail', 'executed'];
    if (!in_array($status, $allowedStatuses)) {
        return redirect()->back()->with('error', 'Invalid status value');
    }

    // Update the status of the room maintenance request
    $roomMaintenance->status = $status;
    $roomMaintenance->save();

    // Redirect back to the room maintenance request details page or show a success message
    return redirect()->action([RoomMaintenanceController::class, 'showAllRequests'])->with('success', 'Maintenance request deleted successfully!');
}

public function show($id)
{
    $roomMaintenance = RoomMaintenance::findOrFail($id);
    
    return view('proctor.updateStatus', compact('roomMaintenance'));
}

public function roomMyRequests()
{
    $roomMaintenances = RoomMaintenance::all();
    
    return view('students.roomMaintenanceMyRequests', compact('roomMaintenances'));
}

public function showResponse($id)
{
    $roomMaintenance = RoomMaintenance::find($id);
    return view('proctor.rroomMaintenanceResponse', ['roomMaintenance' => $roomMaintenance]);
}

public function submitResponse(Request $request, $id)
{
    // Validate the form input
    $validatedData = $request->validate([
        'response' => 'required',
    ]);

    // Find the RoomMaintenance record
    $roomMaintenance = RoomMaintenance::find($id);

    // Update the response attribute
    $roomMaintenance->response = $validatedData['response'];
    $roomMaintenance->save();

    // Redirect back to the room maintenance list or show success message
    return redirect()->action([RoomMaintenanceController::class, 'showAllRequests'])->with('success', 'Maintenance request deleted successfully!');
}
}
