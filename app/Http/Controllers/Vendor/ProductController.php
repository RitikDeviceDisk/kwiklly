<?php

namespace App\Http\Controllers\Vendor;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Vendor\VendorCategory;
use App\Models\Vendor\VendorSubCategory;
use App\Models\Vendor\Product;
use App\Models\Vendor\ProductVariant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;




class ProductController extends Controller
{
    public function list()
    {
        $products = Product::where('vendor_id',Auth::id())->get();
        return view('vendorpanel.product.list',compact('products'));
    }
    public function add()
    {
        $categories = VendorCategory::all();
        $subcategories = VendorSubcategory::all();
        return view('vendorpanel.product.add',compact('categories','subcategories'));
    }
public function store(Request $request)
{
    // $request->validate([
    //     'product_name' => 'required',
    //     'cat_id' => 'required',
    //     'subcat_id' => 'required',
    //     'prod_act_p' => 'required',
    //     'prod_sell_p' => 'required',
    //     'prod_qty' => 'required',
    //     'prod_prc' => 'required',
    //     'prod_weight' => 'required',
    //     'prod_img1' => 'nullable|image|mimes:jpeg,png,jpg,gif',
    // ]);

    // dd($request);
    // Upload product image
    if ($request->hasFile('prod_img1')) {
        $image = $request->file('prod_img1');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/products'), $imageName);
    } else {
        $imageName = null;
    }

        $slug = Str::slug($request->product_name);
        $count = \App\Models\Vendor\Product::where('slug', 'LIKE', "{$slug}%")->count();

        if ($count > 0) {
            $slug .= '-' . ($count + 1);
        }

    // Create product
    $product = Product::create([
        'vendor_id' => Auth::id(),
        'name' => $request->product_name,
        'slug' => $slug,
        'category_id' => $request->cat_id,
        'subcategory_id' => $request->subcat_id,
        'actual_price' => $request->prod_act_p,
        'selling_price' => $request->prod_sell_p,
        'save_price_in_rs' => $request->price_rs,
        'save_price_in_percent' => $request->price_percent,
        'description' => $request->prod_desc,
        'disclaimer' => $request->prod_disclaimer,
        'information' => $request->prod_info,
        'cgst' => $request->cgst,
        'sgst' => $request->sgst,
        'image' => $imageName,
    ]);

    // Save quantity-price-weight entries
    foreach ($request->prod_qty as $index => $qty) {
        ProductVariant::create([
            'product_id' => $product->id,
            'quantity' => $qty,
            'price' => $request->prod_prc[$index],
            'weight_unit' => $request->prod_weight[$index],
        ]);
    }

    return redirect()->route('vendor.prolist')->with('success', 'Product added successfully!');
}

    public function edit()
    {
        return view('vendorpanel.product.edit');
    }
}