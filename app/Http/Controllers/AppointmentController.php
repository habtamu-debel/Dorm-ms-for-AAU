<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;

class AppointmentController extends Controller
{
    public function create()
    {
        return view('students.appointment');
    }

    public function addResponse($id)
    {
        $appointment = Appointment::find($id);
  
        return view('Dean Of Student.Response', ['appointment' => $appointment]);
    }

    public function view()
    {
        $appointments = Appointment::all();
        return view('Dean Of Student.ViewAppointment', compact('appointments'));
    }

    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'reason' => 'required',
            'attachment' => 'required|file',
        ]);

        // Get the file from the request
        $attachment = $request->file('attachment');

        // Store the attachment in the file system
        $attachmentPath = $attachment->store('attachments', 'public');
        $user = session('user');
        // Create a new student record
        $student = Appointment::create([
            'student_id' => $user->student_id,
            'reason' => $request->input('reason'),
            'attachment' => $attachmentPath,
           

        ]);

        // Redirect the user to a success page or return a JSON response
        return redirect()->route('students.successed')->with('success', 'Student registration successful!');
    }

    public function submitResponse(Request $request, $id)
{
    // Validate the form input
    $validatedData = $request->validate([
        'response' => 'required',
    ]);

    // Find the RoomMaintenance record
    $appointment = Appointment::find($id);

    // Update the response attribute
    $appointment->response = $validatedData['response'];
    $appointment->save();

    // Redirect back to the room maintenance list or show success message
    return redirect()->action([AppointmentController::class, 'view'])->with('success', 'Schedule sent  successfully!');



}

public function my()
{
    $user = session('user');
    $studentId = $user->student_id;
    
    $appointments = Appointment::where('student_id', $studentId)->get();
    
    return view('students.myAppointment', compact('appointments'));
}
}
