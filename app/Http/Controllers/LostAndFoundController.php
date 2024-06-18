<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LostAndFoundRequest;
use App\Models\Post;

class LostAndFoundController extends Controller
{
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'item_status' => 'required|string',
                'item_name' => 'required|string',
                'location_found' => 'required|string',
                'date_found' => 'required|date',
                'additional_details' => 'nullable|string',
                'claimant_contact' => 'required|string',
                'photo' => 'nullable|image|max:2048',
            ]);

            $lostAndFoundRequest = new LostAndFoundRequest();
            $user = session('user');
            $lostAndFoundRequest->student_id = $user->student_id;
            $lostAndFoundRequest->item_status = $validatedData['item_status'];
            $lostAndFoundRequest->item_name = $validatedData['item_name'];
            $lostAndFoundRequest->location_found = $validatedData['location_found'];
            $lostAndFoundRequest->date_found = $validatedData['date_found'];
            $lostAndFoundRequest->additional_details = $validatedData['additional_details'];
            $lostAndFoundRequest->claimant_contact = $validatedData['claimant_contact'];

            if ($request->hasFile('photo')) {
                $photo = $request->file('photo');
                $photoPath = $photo->store('lost-and-found', 'public');
                $lostAndFoundRequest->photo = $photoPath;
            }

            $lostAndFoundRequest->save();

            return redirect()->route('lostandfound.index')->with('success', 'Lost and found request created successfully.');
        } catch (Exception $e) {
            // Log the error and handle it appropriately
            Log::error('Error creating lost and found request: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while creating the lost and found request.');
        }
        
    }


    public function index()
    {

        $user = session('user');
        $studentId = $user->student_id;
        $lostAndFounds = LostAndFoundRequest::where('student_id', $studentId)->get();
        
        return view('students.lostAndFoundDisplay', compact('lostAndFounds'));;
    }



    public function lostandfound()
    {

        $lostAndFounds = LostAndFoundRequest::all();
        return view('proctor.lostAndFoundResponse', compact('lostAndFounds'));
    }
    public function edit($id)
{
    $lostAndFound = LostAndFoundRequest::findOrFail($id);
    return view('students.lostandfoundEdit', compact('lostAndFound'));
}

public function update(Request $request, $id)
{
    $lostAndFound = LostAndFoundRequest::findOrFail($id);
    $lostAndFound->update($request->all());
    return redirect()->route('lostandfound.index')->with('success', 'Lost and found request updated successfully.');
}

public function posts($id)
{
    $lostAndFound = LostAndFoundRequest::findOrFail($id);

    // Check if a post with the same details already exists
    $existingPost = Post::where('item_name', $lostAndFound->item_name)
                        ->where('location_found', $lostAndFound->location_found)
                        ->where('date_found', $lostAndFound->date_found)
                        ->first();

    if ($existingPost) {

        $posts = Post::all();

        // Pass the posts to a view for display
        return view('proctor.lostAndFoundPosted', compact('posts'));
        // If a post already exists, return the existing post page
     
    } else {


        $lostAndFound = LostAndFoundRequest::findOrFail($id);
        $lostAndFound->posted = true;
        $lostAndFound->save();
        // Create a new post instance
        $post = new Post();

        // Assign values to post attributes
        $post->item_status = $lostAndFound->item_status;
        $post->item_name = $lostAndFound->item_name;
        $post->location_found = $lostAndFound->location_found;
        $post->date_found = $lostAndFound->date_found;
        $post->additional_details = $lostAndFound->additional_details;

        // Save the post
        $post->save();

        // Retrieve all posts
        $posts = Post::all();

        // Pass the posts to a view for display
        return view('proctor.lostAndFoundPosted', compact('posts'));
    }
}

public function postStudent()
{
    $posts = Post::all();
    return view('students.lostAndFoundPostStudent', compact('posts'));
}


public function showClaim($id)
{
    $post= Post::find($id);
    return view('students.claimItem', ['post' =>  $post]);
}



public function claimStore(Request $request, $id)
{
    // Validate the form input
    $validatedData = $request->validate([
        'additional_info' => 'required',
    ]);

    // Find the post record
    $post = Post::find($id);

    // Check if the post exists
    if (!$post) {
        return redirect()->back()->with('error', 'Post not found.');
    }

    // Find the matching record in the lost_and_found table
    $lostAndFound = LostAndFoundRequest::where('item_name', $post->item_name)
                                  ->where('additional_details', $post->additional_details)
                                  ->first();

    // If a matching record is found, update the claim attribute
    if ($lostAndFound) {
        $user = session('user');
        $lostAndFound->claim = $validatedData['additional_info'];
        $lostAndFound->claimed_id =  $user->student_id;

        $lostAndFound->save();

        // Redirect back to the room maintenance list or show success message
        return redirect()->action([LostAndFoundController::class, 'postStudent'])->with('success', 'Claim information added successfully!');
    } else {
        // If no matching record is found, return an error message
        return redirect()->back()->with('error', 'No matching lost item found.');
    }
}
}