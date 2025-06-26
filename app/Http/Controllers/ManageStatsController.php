<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Import your models
use App\Models\Car;
use App\Models\Rental;
use App\Models\Sale;

class ManageStatsController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalCars = Car::count();
        // Ensure your 'status' column exists and 'active' is a valid status.
        // Adjust this if your 'active rentals' logic is different.
        $activeRentals = Rental::where('status', 'active')->count();
        $totalSalesRevenue = Sale::sum('price'); // This sums the 'price' column for total revenue

        // Placeholder for percentage changes. In a real app, these would be calculated.
        $userChange = 12;
        $carChange = 8;
        $rentalChange = -5; // Make this negative for a decrease
        $salesChange = 23;

        return view('admindashboard.index', compact(
            'totalUsers',
            'totalCars',
            'activeRentals',
            'totalSalesRevenue',
            'userChange',
            'carChange',
            'rentalChange',
            'salesChange'
        ));
    }
}