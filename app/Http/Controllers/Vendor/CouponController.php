<?php

namespace App\Http\Controllers\Vendor;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CouponController extends Controller
{
    public function list()
    {
        return view('vendorpanel.coupon.list');
    }
    public function add()
    {
        return view('vendorpanel.product.add');
    }
    public function edit()
    {
        return view('vendorpanel.product.edit');
    }
}