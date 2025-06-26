<?php

namespace App\Http\Controllers;

use App\Models\User; // Make sure to import your User model
use Illuminate\Http\Request;

class ManageUsersController extends Controller
{
    /**
     * Display a paginated list of users.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Fetch all users with pagination, 5 users per page.
        // You can add conditions here if you want to filter users (e.g., exclude admins).
        $users = User::paginate(5); // Adjust 'User' if your model has a different name

        // Return the view with the paginated users data
        return view('adminDashboard.manageUsers', compact('users'));
    }

    /**
     * Toggle the block status of a specific user.
     *
     * @param  \App\Models\User  $user The user to block/unblock.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function toggleBlock(User $user)
    {
        // Toggle the 'status' field: if 'active', change to 'blocked'; if 'blocked', change to 'active'.
        // Assuming 'status' column exists in your users table.
        // The image of the database shows 'Status', so adjust if it's 'status' or 'Status'.
        // Laravel's convention is lowercase, so 'status' is generally preferred.
        $user->status = ($user->status === 'active') ? 'blocked' : 'active';
        $user->save();

        // Redirect back to the user management page with a success message.
        return redirect()->route('admin.users.index')->with('success', 'User status updated successfully!');
    }
}
