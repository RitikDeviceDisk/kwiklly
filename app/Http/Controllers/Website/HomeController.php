<?php

namespace App\Http\Controllers\Website;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use App\Models\VendorAdmin;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index()
    {
        
// DB::enableQueryLog(); //  Start logging queries

            $data['stores'] = VendorAdmin::where('status', '1')
                ->where('is_active', '1')
                ->whereNull('deleted_at')
                ->limit(6)
                ->get();

            // dd(DB::getQueryLog());

        // $data['stores']= VendorAdmin::where(['status'=>'1','is_active'=>'1','deleted_at'=>''])->get();
        $data['banners']= Banner::where('is_deleted','0')->get();
        $data['categories']= Category::where('is_deleted','0')->get();
        return view('web.index')->with($data);
    }
    public function department()
    {
        return view('web.department');
    }
    public function stores($slug='')
    {
        $data['categories']= Category::where('is_deleted','0')->get();
        $data['stores'] = VendorAdmin::where('status', '1')
        ->where('is_active', '1')
        ->whereNull('deleted_at')
        ->get();
        $data['slug'] = $slug;

        return view('web.stores')->with($data);
    }
    public function explorestore($slug='')
    {
      

        return view('web.explorestore');
    }
    public function productdetails()
    {
        return view('web.productdetails');
    }
    public function searchresults()
    {
        return view('web.searchresults');
    }

    /*------------------------------------------------*/ 
    
  
    public function product()
    {
        return view('vendor.vendor-signin');
    }
    public function privacyPolicy()
    {
        return view('vendor.vendor-signin');
    }
    public function termsConditions()
    {
        return view('vendor.vendor-signin');
    }
    public function returnPolicy()
    {
        return view('vendor.vendor-signin');
    }
    public function aboutUs()
    {
        return view('vendor.vendor-signin');
    }
    public function contactUs()
    {
        return view('vendor.vendor-signin');
    }


    
}