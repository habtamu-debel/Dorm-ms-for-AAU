<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;

class AnnouncementController extends Controller
{
    public function create()
    {
        return view('create_announcement');
    }

    public function store(Request $request)
    {
       
        $validatedData = $request->validate([
            
            'title' => 'required',
            'content' => 'required',
            'type' => 'required',
            
         
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

    $user = session('user');
    $validatedData['role'] = $user->role;
 
  
    
    // Create the announcement
    $announcement = Announcement::create($validatedData);
    $announcement->save();
   

    return redirect()->route('proctor.announcementSuccess')->with('success', 'Block created successfully');
    }

    
    public function index()
    {
        $latestAnnouncement = Announcement::latest()->first();
        $otherAnnouncements = Announcement::where('id', '!=', $latestAnnouncement?->id)
                                          ->orderByDesc('created_at')
                                          ->get();
    
        $announcements = collect([$latestAnnouncement])
                         ->merge($otherAnnouncements)
                         ->filter(function ($announcement) {
                             return $announcement !== null;
                         });
    
        return view('students.viewAnnouncment', compact('announcements'));
    }

    public function indexx()
    {
        $user = session('user');
        $announcements = Announcement::where('role', $user->role)->get();
    
        return view('proctor.postAnnouncmentDisplay', compact('announcements'));
    }
public function edit($id)
    {
        // Retrieve the announcement by ID from the database
        $announcement = Announcement::find($id);

        // Add your logic for editing the announcement
        // ...

        // Return the view for editing the announcement
        return view('proctor.postAnnouncmentEdit', ['announcement' => $announcement]);
    }

    public function destroy($id)
    {
        // Retrieve the announcement by ID from the database
        $announcement = Announcement::find($id);

        // Add your logic for deleting the announcement
        // ...

        // Delete the announcement
        $announcement->delete();

        // Redirect to the desired page after deletion
        return redirect()->route('proctorAnnouncement.indexx')->with('success', 'Announcement deleted successfully');
    }


    public function update(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'type' => 'required',
            // Add validation rules for other fields if needed
        ]);

        // Retrieve the announcement by ID from the database
        $announcement = Announcement::find($id);

        // Update the announcement with the validated data
        $announcement->title = $validatedData['title'];
        $announcement->content = $validatedData['content'];
        $announcement->type = $validatedData['type'];
        // Update other fields if needed

        // Save the updated announcement
        $announcement->save();

        // Redirect to the desired page after the update
        return redirect()->route('proctorAnnouncement.indexx')->with('success', 'Announcement updated successfully');
    }
}