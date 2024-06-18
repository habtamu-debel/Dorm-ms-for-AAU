<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProctorRequest;



class ProctorRequestController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'requestId' => 'required|unique:proctor_requests',
            'category' => 'required',
            'occurrence' => 'required',
            'media' => 'nullable|file|max:5000',
            'impact' => 'required',
            'urgency' => 'required',
            'room' => 'required',
            'description' => 'required',
            'contact' => 'required',
        ]);


        $validatedData['occurrence'] = date('Y-m-d', strtotime($validatedData['occurrence']));       
    if ($request->hasFile('media')) {
        $file = $request->file('media');

        // Generate a unique filename
        $filename = uniqid() . '.' . $file->getClientOriginalExtension();

        // Move the file to the 'attachments' folder
        $file->move('media', $filename);

        // Store the file path in the 'attachment' field of the announcement
        $validatedData['media'] = $filename;
    }
    
    $proctorRequest = ProctorRequest::create($validatedData);

    return redirect()->route('admin.success');

        // Redirect or perform any other actions after storing the data

        // For example, redirect back to the form with a success message
        
    }

    public function index()
    {
        $proctorRequests = ProctorRequest::all();

        return view('proctor.proctorRequest', compact('proctorRequests'));
    }

    public function edit(ProctorRequest $proctorRequest)
    {
        return view('proctor.proctorRequestEdit', compact('proctorRequest'));
    }


    public function update(Request $request, $id)

    
{
    $proctorRequest = ProctorRequest::findOrFail($id);
    $validatedData = $request->validate([
        'requestId' => 'required|unique:proctor_requests,requestId,'. $proctorRequest->id,
        'category' => 'required',
        'occurrence' => 'required|date',
        'media' => 'nullable|file|max:5000',
        'impact' => 'required',
        'urgency' => 'required',
        'room' => 'required',
        'description' => 'required',
        'contact' => 'required',
    ]);

    if ($request->hasFile('media')) {
        $file = $request->file('media');

        // Generate a unique filename
        $filename = uniqid() . '.' . $file->getClientOriginalExtension();

        // Move the file to the 'media' folder
        $file->move('media', $filename);

        // Delete the old media file, if exists
        if ($proctorRequest->media) {
            Storage::delete('media/' . $proctorRequest->media);
        }

        // Update the media field with the new filename
        $validatedData['media'] = $filename;
    }

    $proctorRequest->update($validatedData);

    return redirect()->route('proctor-requests.index')
    ->with('success', 'Proctor request updated successfully!');
}
public function destroy($id)
{
    $proctorRequest = ProctorRequest::findOrFail($id);

    // Delete the media file, if exists
    if ($proctorRequest->media) {
        Storage::delete('media/' . $proctorRequest->media);
    }

    $proctorRequest->delete();

    return redirect()->route('proctor-requests.index')->with('success', 'Proctor request deleted successfully!');
}
}
