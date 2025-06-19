<?php

namespace App\Http\Controllers\Vendor;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\VendorAdmin;
use App\Models\Category;
use App\Models\Vendor\TimeSlot;


class VendorDashboardController extends Controller
{
    public function dashboard()
    {
        $vendor = VendorAdmin::find(Auth::id());
        return view('vendorpanel.dashboard',compact('vendor'));
    }
    public function profile()
    {
        $data['vendor'] = VendorAdmin::find(Auth::id());
        $data['categories'] = Category::where('is_active', '1')->get();
        $data['store_times'] = TimeSlot::get();
        return view('vendorpanel.profile')->with($data);
    }
    public function updateProfile(Request $request)
        {
            $request->validate([
                'dname' => 'required|string',
                'minimum_order_value' => 'nullable|numeric',
                'email' => 'required|email',
                // Add other validations as per your requirements
            ]);
        
            $vendor = VendorAdmin::find(Auth::id());
            if (!$vendor) {
                return back()->with('error', 'Vendor not found');
            }
        
            $open_time = date("H:i:s", strtotime($request->open_time));
            $close_time = date("H:i:s", strtotime($request->close_time));

        
            $vendor->display_name = $request->dname;
            $vendor->business_category = is_array($request->buss_cat) ? implode(',', $request->buss_cat) : null;
            $vendor->minimum_order_value = $request->minimum_order_value;
            $vendor->business_description = $request->bdesc;
            $vendor->open_time = $open_time;
            $vendor->close_time = $close_time;
            $vendor->service_offered = $request->service_offered;
            $vendor->business_name = $request->busname;
            $vendor->gstin = $request->gstin;
            $vendor->landmark = $request->landmark;
            $vendor->business_address = $request->business_address;
            $vendor->email = $request->email;
            $vendor->phone = $request->phone;
            $vendor->account_holder_name = $request->account_holder_name;
            $vendor->account_number = $request->account_number;
            $vendor->ifsc_code = $request->ifsc_code;
            $vendor->bank_name = $request->bank_name;
            $vendor->bank_city = $request->back_city;
            $vendor->bank_branch = $request->branch;
            $vendor->address_proof = $request->add_proof;
            $vendor->pan_number = $request->buss_pan;
            $vendor->personal_pan = $request->p_pan;
            $vendor->personal_address_proof_image = $request->addr_proof;
        
            // Handle File Uploads
          $fileFields = [
                    'cancle_cheque_img', 'pan_img', 'add_img', 'personal_pan_img', 'proof_img'
                ];
                
                foreach ($fileFields as $field) {
                    if ($request->hasFile($field)) {
                        $file = $request->file($field);
                        // Use the custom disk for storing files in the 'uploads' directory
                        $path = $file->store('vendor_files', 'custom_uploads');
                        $vendor->{$this->getVendorFieldFromInput($field)} = 'uploads/' . $path;
                    }
                }
        
            $vendor->save();
        
            return back()->with('success', 'Profile updated successfully.');
        }
        
        private function getVendorFieldFromInput($input)
        {
            return [
                'cancle_cheque_img' => 'cancel_cheque_image',
                'pan_img' => 'pan_image',
                'add_img' => 'address_proof_image',
                'personal_pan_img' => 'personal_pan_image',
                'proof_img' => 'personal_address_proof_image',
            ][$input];
        }

}