<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MasterLocation;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class MasterLocationController extends Controller
{
    //
    public function index()
    {
        $title = 'Master Locations';
        $admin = Auth::guard('admin')->user();
       // $locations = MasterLocation::all(); // Fetch all master locations
        // Logic to display master locations
        return view('admin.location.index', compact('title', 'admin'));
    }
    public function createLocation()
    {
        $title = 'Create Master Location';
        $admin = Auth::guard('admin')->user();
        return view('admin.location.create', compact('title', 'admin'));
    }
    public function storeLocation(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        MasterLocation::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.locations.index')->with('success', 'Master Location created successfully.');
    }
}
