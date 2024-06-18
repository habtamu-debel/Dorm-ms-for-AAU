<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PMannouncement;
use Illuminate\Support\Facades\Storage;

class PostAnnouncementPMController extends Controller
{
    public function create()
    {
        return view('proctor Manager.postAnnouncmentPM');
    }

    
public function index()
{
    
    $announcements = PMannouncement::all();

    return view('proctor.viewAnnouncmentP', compact('announcements'));
}

public function indexx()
{
    $announcements = PMannouncement::all();

    return view('proctor.viewAnnouncmentPM', compact('announcements'));
}

    public function store(Request $request)
    {
        $validatedData = $request->validate([
           
            'title' => 'required',
            'content' => 'required',
            'type' => 'required',
            'attachment' => 'nullable|file|max:5000',
            // Assuming 'postId' is the field name in the form
        ]);

       
    if ($request->hasFile('attachment')) {
        $file = $request->file('attachment');

        // Generate a unique filename
        $filename = uniqid() . '.' . $file->getClientOriginalExtension();

        // Move the file to the 'attachments' folder
        $file->move('attachments', $filename);

        // Store the file path in the 'attachment' field of the announcement
        $validatedData['attachment'] = $filename;
    }
    

    // Create the announcement
    $announcement = PMannouncement::create($validatedData);

    return redirect()->route('announcementPM.indexx')->with('success', 'Announcement posted successfully!');
}

public function edit($id)
{
    $announcement = PMannouncement::findOrFail($id);

    return view('proctor Manager.postAnnouncmentPMEdit', compact('announcement'));
}

public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'title' => 'required',
        'content' => 'required',
        'type' => 'required',
        'attachment' => 'nullable|file|max:5000',
    ]);

    $announcement = PMannouncement::findOrFail($id);

    if ($request->hasFile('attachment')) {
        // Delete the previous attachment file
        Storage::delete('attachments/' . $announcement->attachment);

        $file = $request->file('attachment');
        $filename = uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move('attachments', $filename);
        $validatedData['attachment'] = $filename;
    }

    $announcement->update($validatedData);

    return redirect()->route('announcementPM.indexx')->with('success', 'Announcement posted successfully!');
}


public function destroy($id)
{
    $announcement = PMannouncement::findOrFail($id);
    $announcement->delete();

    return redirect()->route('announcementPM.indexx')->with('success', 'Announcement deleted successfully!');
}
}
