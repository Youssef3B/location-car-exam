<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rental; // Assuming you have a Rental model
use App\Models\Car;    // Assuming you have a Car model
use App\Models\User;   // Assuming you have a User model

class ManageRentalsController extends Controller
{
    /**
     * Display a listing of the rentals.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Fetch all rentals with their associated car and user details
        // 'car' and 'user' are assumed to be relationship methods in your Rental model
        $rentals = Rental::with(['car', 'user'])->orderBy('created_at', 'desc')->get();

        // Pass the rentals data to the view
        return view('adminDashboard.manageRentals', compact('rentals'));
    }

    /**
     * Accept a pending rental request.
     * Changes the rental status from 'pending' to 'approved'.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id  The ID of the rental to accept.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function accept(Request $request, $id)
    {
        // Find the rental by its ID
        $rental = Rental::findOrFail($id);

        // Check if the current status is 'pending' before updating
        if ($rental->status === 'pending') {
            $rental->status = 'approved'; // Set status to 'approved'
            $rental->save(); // Save the changes to the database

            // Redirect back with a success message
            return redirect()->back()->with('success', 'Rental request approved successfully!');
        }

        // Redirect back with an error message if the status is not pending
        return redirect()->back()->with('error', 'Rental cannot be approved as it is not in pending status.');
    }

    /**
     * Decline a pending rental request.
     * Changes the rental status from 'pending' to 'canceled'.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id  The ID of the rental to decline.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function decline(Request $request, $id)
    {
        // Find the rental by its ID
        $rental = Rental::findOrFail($id);

        // Check if the current status is 'pending' before updating
        if ($rental->status === 'pending') {
            $rental->status = 'canceled'; // Set status to 'canceled'
            $rental->save(); // Save the changes to the database

            // Redirect back with a success message
            return redirect()->back()->with('success', 'Rental request declined successfully!');
        }

        // Redirect back with an error message if the status is not pending
        return redirect()->back()->with('error', 'Rental cannot be declined as it is not in pending status.');
    }

    /**
     * Mark a rental as completed.
     * This method is optional, but useful for a full lifecycle.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id  The ID of the rental to mark as completed.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function complete(Request $request, $id)
    {
        $rental = Rental::findOrFail($id);

        // Only allow completion if the rental is approved
        if ($rental->status === 'approved') {
            $rental->status = 'completed';
            $rental->save();
            return redirect()->back()->with('success', 'Rental marked as completed!');
        }

        return redirect()->back()->with('error', 'Rental can only be completed if it is approved.');
    }

    /**
     * Delete a rental record.
     *
     * @param  int  $id  The ID of the rental to delete.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $rental = Rental::findOrFail($id);
        $rental->delete();
        return redirect()->back()->with('success', 'Rental record deleted successfully!');
    }
}
