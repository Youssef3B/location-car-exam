<?php

namespace App\Http\Controllers;

use App\Models\Car; // Import the Car model
use Illuminate\Http\Request;

class CarDetailssPgeController extends Controller
{
    public function show(Car $car) // Laravel automatically injects the Car model based on the route
    {
        return view('productDetails', compact('car'));
    }
}