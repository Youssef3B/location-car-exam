<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;


class DashboardadminController extends Controller
{
    //
      public function DashboardAdminView()
    {
        return view('adminDashboard.index');
    }
    public function DashboardAdminCarsView()
    {
        return view('adminDashboard.manageCars');
    }
    public function DashboardAdminRentalsView()
    {
        return view('adminDashboard.manageRentals');
    }
    public function DashboardAdminSalesView()
    {
        return view('adminDashboard.manageSales');
    }
    public function DashboardAdminUsersView()
    {
        return view('adminDashboard.manageUsers');
    }

    public function DashboardAdminMessagesView()
    {
        return view('adminDashboard.messages');
    }








public function store(Request $request)
{
    $validated = $request->validate([
        'brand' => 'required|string|max:255',
        'model' => 'required|string|max:255',
        'year' => 'required|digits:4|integer|min:1900|max:'.(date('Y')+1),
        'fuel_type' => 'required|string|max:255',
        'Status' => 'required|string|in:available,under_review,unavailable',
        'mileage' => 'nullable|integer|min:0',
        'price' => 'required|numeric|min:0',
        'priceRental' => 'nullable|required_if:is_rental,1|numeric|min:0',
        'is_rental' => 'required|boolean',
        'description' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Handle file upload
    if ($request->hasFile('image')) {
        $validated['image'] = $request->file('image')->store('cars', 'public');
    }

    // Create new car record
    Car::create($validated);

    return redirect()->back()->with('success', 'Car added successfully!');
}

public function update(Request $request, Car $car)
{
    $validated = $request->validate([
        'brand' => 'required|string|max:255',
        'model' => 'required|string|max:255',
        'year' => 'required|digits:4|integer|min:1900|max:'.(date('Y')+1),
        'fuel_type' => 'required|string|max:255',
        'Status' => 'required|string|in:available,under_review,unavailable',
        'mileage' => 'nullable|integer|min:0',
        'price' => 'required|numeric|min:0',
        'priceRental' => 'nullable|required_if:is_rental,1|numeric|min:0',
        'is_rental' => 'required|boolean',
        'description' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Handle file upload if new image is provided
    if ($request->hasFile('image')) {
        // Delete old image if it exists
        if ($car->image) {
            Storage::disk('public')->delete($car->image);
        }
        $validated['image'] = $request->file('image')->store('cars', 'public');
    }

    // Update car record
    $car->update($validated);

    return redirect()->back()->with('success', 'Car updated successfully!');
}

  public function destroy(Car $car)
    {

        $car->delete(); 

        return redirect()->back()->with('success', 'Car deleted successfully!');
    }






 public function manageCars()
    {
        $cars = Car::with('owner') // Assuming you have an owner relationship
                 ->orderBy('created_at', 'desc')
                 ->paginate(6);
        
        return view('adminDashboard.manageCars', compact('cars'));
    }


    
}
