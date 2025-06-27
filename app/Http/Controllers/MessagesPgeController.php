<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact; // Make sure your Contact model exists
use Illuminate\Support\Facades\Validator;

class MessagesPgeController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // If validation fails, redirect back with errors and old input
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Create a new contact message in the database
        Contact::create([
            'fullname' => $request->name, // Ensure this matches your database column name
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        // Redirect to the contact page with a success message
        return redirect()->route('contact')
            ->with('success', 'Your message has been sent successfully! We\'ll get back to you soon.');
    }
}