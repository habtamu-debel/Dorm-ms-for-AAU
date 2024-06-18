<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormEmail;

class ContactController extends Controller
{
    public function submitForm(Request $request)
    {   dd('good');
        // Retrieve form data
        $name = $request->input('name');
        $email = $request->input('email');
        $message = $request->input('message');

        // Add your logic here to process the form data (e.g., store in a database)

        // Send email
        try {
            // Pass form data to the Mailable class
            Mail::to('your-email@example.com')->send(new ContactFormEmail($name, $email, $message));

            // Return a JSON response indicating success
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            // Log any errors or display an error message
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }
}