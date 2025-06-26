<?php

namespace App\Http\Controllers;

use App\Models\Sale; // Import the Sale model
use Illuminate\Http\Request;

class ManageSalesController extends Controller
{
    /**
     * Display a listing of the sales.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Fetch all sales with pagination, eager loading the 'car' and 'buyer' relationships.
        // We're using a simple pagination of 10 items per page.
        // The 'buyer' relationship is a User model. If 'seller' is distinct, you'd need a separate relationship
        // or a way to determine the seller from the car/sale. For now, 'seller' is hardcoded in the blade,
        // so we'll just focus on car and buyer.
        $sales = Sale::with(['car', 'buyer'])->paginate(10);

        // Return the view and pass the paginated sales data to it.
        return view('adminDashboard.manageSales', compact('sales'));
    }
}
