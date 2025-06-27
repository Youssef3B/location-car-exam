<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use Illuminate\Support\Facades\Auth;

class HistoryPgeController extends Controller
{
    public function index()
    {
        // Get the authenticated user's ID
        $userId = Auth::id();
        
        // Get sales for the logged-in user with car information
        $sales = Sale::with(['car', 'buyer'])
                    ->where('buyer_id', $userId)
                    ->orderBy('purchased_at', 'desc')
                    ->get();
        
        // Return the view with the filtered sales data
        return view('history', compact('sales'));
    }
}