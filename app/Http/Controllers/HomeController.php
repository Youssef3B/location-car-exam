<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class HomeController extends Controller
{
    public function home()
    {
        $latestCars = Car::latest()->take(3)->get();
        return view('home', ['latestCars' => $latestCars]);
    }
}