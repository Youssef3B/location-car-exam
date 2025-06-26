<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car; // Don't forget to import your Car model

class CarsPgeController extends Controller
{
    public function index()
    {
        // Fetch all cars and paginate them, 6 cars per page
        $cars = Car::paginate(6);

        // Pass the paginated cars to the view
        return view('Buyrent', compact('cars'));
    }
}