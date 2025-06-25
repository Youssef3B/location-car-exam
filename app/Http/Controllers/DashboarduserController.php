<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboarduserController extends Controller
{
    //
      public function DahboardUser()
    {
        return view('userDashboard.userDashboard');
    }
}
