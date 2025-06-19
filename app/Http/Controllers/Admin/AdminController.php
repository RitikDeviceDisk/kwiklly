<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\VendorAdmin;

class AdminController extends Controller
{
     // Show login form
     public function index()
     {
        $title = 'Admin | Login';
         return view('admin.login',compact('title'));
     }

     // Handle login request
     public function loginCheck(Request $request)
     {
         $request->validate([
             'email' => 'required|email',
             'password' => 'required'
         ]);

         if (Auth::guard('admin')->attempt($request->only('email', 'password'))) {
             return redirect()->route('admin.dashboard');
         }

         return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
     }

     public function profile()
     {
         $admin = Auth::guard('admin')->user();
         $title = 'Admin | Profile';
         return view('admin.profile', compact('admin','title'));
     }


    public function updateProfile(Request $request)
    {
        $admin = Auth::guard('admin')->user();

        // Debugging: Check if $admin is null
        if (!$admin) {
            return redirect()->route('admin.login')->withErrors(['error' => 'Unauthorized access.']);
        }

        // Validate inputs
        $request->validate([
            'business_name' => 'nullable|string|max:255',
            'business_category' => 'nullable|string|max:255',
            'business_description' => 'nullable|string',
            'business_address' => 'nullable|string',
            'state' => 'nullable|string',
            'city' => 'nullable|string',
            'postal_code' => 'nullable|string|max:10',
            'area' => 'nullable|string',
            'bank_name' => 'nullable|string|max:255',
            'bank_branch' => 'nullable|string|max:255',
            'account_holder_name' => 'nullable|string|max:255',
            'account_number' => 'nullable|string|max:20',
            'ifsc_code' => 'nullable|string|max:20',
            'business_logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        // Ensure admin is an instance of VendorAdmin
        $admin = VendorAdmin::find($admin->id);

        if (!$admin) {
            return redirect()->route('admin.profile')->withErrors(['error' => 'Admin not found.']);
        }

        // Update profile details
        $admin->fill($request->except('business_logo'));

        // Handle image upload
        if ($request->hasFile('business_logo')) {
            $imagePath = $request->file('business_logo')->store('uploads/business_logos', 'public');
            $admin->business_logo = $imagePath;
        }

        $admin->save(); // Save the changes

        return redirect()->route('admin.profile')->with('success', 'Profile updated successfully.');
    }

    public function showChangePasswordForm()
    {
        $admin = Auth::guard('admin')->user();
        $title = 'Admin | Change Password';
        return view('admin.change_password', compact('admin','title'));
    }

    public function updatePassword(Request $request)
    {
        $admin = Auth::guard('admin')->user();

        // Validate inputs
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);

        $admin =  VendorAdmin::find($admin->id);

        // Check if old password is correct
        if (!Hash::check($request->old_password, $admin->password)) {
            return back()->with('error', 'Current password is incorrect.');
        }

        // Update password
        $admin->password = Hash::make($request->new_password);
        $admin->save();

        return back()->with('success', 'Password updated successfully.');
    }

     // Logout function
     public function logout()
     {
         Auth::guard('admin')->logout();
         return redirect()->route('admin.login');
     }
}
