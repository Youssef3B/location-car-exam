<?php

namespace App\Http\Controllers;

use App\Models\Message; // Import the Message model
use Illuminate\Http\Request;

class ManageMessagesController extends Controller
{
    /**
     * Display a listing of the messages with pagination.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Fetch all messages from the database
        // Eager load sender and receiver relationships to avoid N+1 query problem
        // Paginate the results, showing 10 messages per page
        $messages = Message::with(['sender', 'receiver'])->latest()->paginate(10);

        // Return the view with the paginated messages
        return view('adminDashboard.messages', compact('messages'));
    }
}