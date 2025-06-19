<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VendorAdmin;
use Illuminate\Support\Facades\Auth;

class VendorController extends Controller
{
    //
    public function approve()
    {
        $title = 'Admin | Approve Vendor';
        $admin = Auth::guard('admin')->user();
        $vendors = VendorAdmin::where('status', 1)->latest()->get();
        return view('admin.vendor.approve', compact('title', 'admin', 'vendors'));
    }

    public function pending()
    {
        $title = 'Admin | Pending Vendor';
        $admin = Auth::guard('admin')->user();
        $vendors = VendorAdmin::where('status', 0)->latest()->get();
        return view('admin.vendor.pending', compact('title', 'admin', 'vendors'));
    }
    public function rejected()
    {
        $title = 'Admin | Rejected Vendor';
        $admin = Auth::guard('admin')->user();
        $vendors = VendorAdmin::where('status', 2)->latest()->get();
        return view('admin.vendor.rejected', compact('title', 'admin', 'vendors'));
    }
   // Show vendor details by UUID
    public function show($uuid)
    {
        $title = 'Admin | Vendor Details';
        $admin = Auth::guard('admin')->user();
        $vendor = VendorAdmin::where('uuid', $uuid)->firstOrFail();

        return view('admin.vendor.show', compact('title', 'admin', 'vendor'));
    }

    // Update status and comment
    public function updateStatus(Request $request, $uuid)
    {
        $request->validate([
            'status' => 'required|in:0,1,2',
            'comment' => 'nullable|string|max:1000',
        ]);

        $vendor = VendorAdmin::where('uuid', $uuid)->firstOrFail();
        $vendor->status = $request->status;
        $vendor->admin_comments = $request->comment; // Make sure this column exists
        $vendor->save();

        if($request->status == 1) {
            return redirect()->route('admin.vendor.approve')->with('success', 'Vendor approved successfully.');
        }else if($request->status == 0) {
            return redirect()->route('admin.vendor.pending')->with('success', 'Vendor status updated to pending.');
        } else {
            return redirect()->route('admin.vendor.rejected')->with('success', 'Vendor rejected successfully.');
        }

    }
    // Delete vendor
    public function destroy($uuid)
    {
        $vendor = VendorAdmin::where('uuid', $uuid)->firstOrFail();
        $vendor->delete();

        return redirect()->back()->with('success', 'Vendor deleted successfully.');
    }

}
