<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BusinessCredentials;
use Illuminate\Support\Facades\Auth;

class BusinessController extends Controller
{
    public function create()
    {
        return view('business.setup');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'business_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'db_host' => 'required|string',
            'db_port' => 'required|string',
            'db_name' => 'required|string',
            'db_username' => 'required|string',
            'db_password' => 'nullable|string',
        ]);

        $credentials = BusinessCredentials::create([
            'user_id' => auth()->id(),
            'business_name' => $validated['business_name'],
            'address' => $validated['address'],
            'phone' => $validated['phone'],
            'db_host' => $validated['db_host'],
            'db_port' => $validated['db_port'],
            'db_name' => $validated['db_name'],
            'db_username' => $validated['db_username'],
            'db_password' => $validated['db_password'],
        ]);

        // Update user's business credentials reference
        auth()->user()->update([
            'business_credentials_id' => $credentials->id
        ]);

        return redirect('/clients')->with('success', 'Business profile setup complete!');
    }

    public function logout(Request $request)
    {
        Auth::guard('business')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/')->with('success', 'You have been logged out successfully.');
    }
} 