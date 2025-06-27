<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Add this line
use Illuminate\Support\Facades\Hash;

class EditUserPgeController extends Controller
{
    public function index()
    {
        // Get the authenticated user (or specific user you want to edit)
        $user = auth()->user();
        
        // Return the view with user data
        return view('editUser', compact('user'));
    }
    
    public function update(Request $request)
    {
        $user = auth()->user();
        
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'password' => 'nullable|min:8',
            'phoneNumber' => 'nullable|string|max:20'
        ]);
        
        // Update user data
        $user->name = $request->name;
        $user->email = $request->email;
        
        // Only update password if provided
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        
        // Add phone number if you have that field
        if ($request->phoneNumber) {
            $user->phoneNumber = $request->phoneNumber;
        }
        
        $user->save();
        
        return redirect()->back()->with('success', 'Profile updated successfully!');
    }
}