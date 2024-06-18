<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DirectorAnnouncement;

class DirectorAnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $announcements = DirectorAnnouncement::all();

        return view('proctor Director.postAnnouncementDisplayss', compact('announcements'));
    }

    public function create()
    {
        return view('proctor Director.postAnnouncment');
    }
    /**
     * Show the form for creating a new resource.
     */
   

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'type' => 'required',
            'attachment' => 'required',
        ]);
    
        $announcement = new DirectorAnnouncement();
        $announcement->title = $validatedData['title'];
        $announcement->content = $validatedData['content'];
        $announcement->type = $validatedData['type'];
        $announcement->attachment = $validatedData['attachment'];
    
        $announcement->save();
    
        return redirect()->route('directorAnnouncement.index')->with('success', 'Announcement created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function indexx()
    {
        $announcements = DirectorAnnouncement::all();

        return view('proctor Director.viewAnnouncmentt', compact('announcements'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $announcement = DirectorAnnouncement::find($id);
        return view('proctor Director.postAnnouncmentEditt', ['announcement' => $announcement]);
    }

    /**
     * Update the specified resource in storage.
     */
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
        $announcement = DirectorAnnouncement::find($id);

        // Update the announcement with the validated data
        $announcement->title = $validatedData['title'];
        $announcement->content = $validatedData['content'];
        $announcement->type = $validatedData['type'];
        // Update other fields if needed

        // Save the updated announcement
        $announcement->save();

        // Redirect to the desired page after the update
        return redirect()->route('directorAnnouncement.index')->with('success', 'Announcement updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Retrieve the announcement by ID from the database
        $announcement = DirectorAnnouncement::find($id);

        // Add your logic for deleting the announcement
        // ...

        // Delete the announcement
        $announcement->delete();

        // Redirect to the desired page after deletion
        return redirect()->route('directorAnnouncement.index')->with('success', 'Announcement deleted successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
   
}
