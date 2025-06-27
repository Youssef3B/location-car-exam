<?php

namespace App\Http\Controllers;

use App\Models\Contact; // Import the Contact model instead of Message
use Illuminate\Http\Request;

class ManageMessagesController extends Controller
{
    /**
     * Display a listing of the contact messages with pagination.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Fetch all contact messages from the database
        // No eager loading of sender/receiver needed as Contact model doesn't have these relationships
        // Paginate the results, showing 10 messages per page
        $messages = Contact::latest()->paginate(10);

        // Return the view with the paginated contact messages
        return view('adminDashboard.messages', compact('messages'));
    }
}
