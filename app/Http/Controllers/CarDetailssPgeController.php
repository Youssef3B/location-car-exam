<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Sale; // Import the Sale model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Import Auth facade for authenticated user

class CarDetailssPgeController extends Controller
{
    /**
     * Display the specified car details.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\View\View
     */
    public function show(Car $car)
    {
        return view('productDetails', compact('car'));
    }

    /**
     * Handle the purchase of a car.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\RedirectResponse
     */
    public function purchase(Request $request, Car $car)
    {
        // Ensure the user is authenticated before proceeding
        if (!Auth::check()) {
            // Redirect to login with an error message if not logged in
            return redirect()->route('login')->with('error', 'Please log in to complete your purchase.');
        }

        // Check if the car is actually available for sale
        if ($car->Status !== 'available') {
            return redirect()->back()->with('error', 'This car is not available for purchase at the moment.');
        }

        // Optional: Prevent users from buying their own listed cars
        if ($car->user_id === Auth::id()) {
            return redirect()->back()->with('error', 'You cannot purchase your own car listing.');
        }

        try {
            // Create a new Sale record
            Sale::create([
                'car_id' => $car->id,
                'buyer_id' => Auth::id(), // The ID of the currently authenticated user
                'price' => $car->price, // Use the car's current price
                'purchased_at' => now(), // Set the purchase timestamp
            ]);

            // Update the car's status to 'sold'
            $car->update(['Status' => 'sold']);

            // Redirect back to the car details page with a success message
            return redirect()->route('cars.details', $car->id)->with('success', 'Congratulations! Your purchase was successful.');

        } catch (\Exception $e) {
            // Log the error for debugging purposes
            \Log::error('Car purchase failed: ' . $e->getMessage());

            // Redirect back with an error message
            return redirect()->back()->with('error', 'There was an error processing your purchase. Please try again.');
        }
    }
}