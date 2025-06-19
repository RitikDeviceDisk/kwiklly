@extends('web.include.main')
@section('content')
<!-- first section start  -->
<section class="extrapadding2">
 <div class="container">
    <div class="row">
        <div class="col-md-12 bannerimg p-0">
        <!-- Show top banner (banner_cat_id = 1)  -->
            @php
                $topBanner = collect($banners)->firstWhere('banner_cat_id', 1);
            @endphp
            @if($topBanner)
                <div class="top-banner">
                    <img src="{{ asset('public/' . $topBanner['desktop_image']) }}" alt="" class="img-fluid">
                </div>
            @endif
        </div>
    </div>
 </div>
</section>
<!-- first section end  -->
<!-- second section start  -->
<section>
<div class="container">
    <div class="row d-none d-md-flex text-center">
        <!-- Show other banners in loop (banner_cat_id = 2) -->
            @php
                $secondBanners = collect($banners)->where('banner_cat_id', 2);
            @endphp
            @foreach($secondBanners as $banner)
                <div class="col-md-4 bannerimg">
                    <img src="{{ asset('public/' . $banner['desktop_image']) }}" alt="" class="img-fluid">
                </div>
            @endforeach
    </div> 

    <!-- Mobile Slider -->
    <div id="mobileSlider" class="carousel slide d-md-none" data-bs-ride="carousel" data-bs-interval="2000">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('public/assets/website/images/banner2.png')}}" class="d-block w-100 img-fluid" alt="">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('public/assets/website/images/banner3.png')}}" class="d-block w-100 img-fluid" alt="">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('public/assets/website/images/banner4.png')}}" class="d-block w-100 img-fluid" alt="">
            </div>
        </div>
    </div>
</div>
</section>
<!-- second section end  -->
<!-- third section start  -->
<section>
<div class="container mt-4">
        <h4 class="pb-3 pt-4 headingclass">Trending Products</h4>
        <div class="owl-carousel owl-theme mb-4">
            <div class="item">
                <div class="product-card p-0">
                    <span class="discount-label">20% Off</span>
                    <a href="{{ route('productdetails')}}"><img src="{{ asset('public/assets/website/images/product4.png')}}" class="product-image" alt="Milk"></a>
                    <div class="product-title cardpadding">Mother Dairy Toned Milk</div>
                    <div class="product-info cardpadding">500 ml</div>
                    <div class="price-container cardpadding">
                        <span class="price">
                            <span class="rupee-symbol">₹</span> 30
                        </span>
                        <span class="original-price">
                            <span class="rupee-symbol2">₹</span> 38
                        </span>                        
                        <button class="add-btn d-flex flex-column align-items-center position-relative" onclick="openPopup()">
                            <div class="d-flex align-items-center">
                                Add
                                <img src="{{ asset('public/assets/website/images/cart.svg')}}" alt="" class="ms-2">
                            </div>
                            <div class="cart-options text-black">5 Options</div>
                        </button>
                    </div>
                    <div class="store-info ">
                        <span>Ad </span>
                        <span>Chandrash Grocery</span>
                        <span>5 min </span>
                    </div>
                </div>                
            </div>
            <div class="item">
                <div class="product-card p-0">
                    <span class="discount-label">20% Off</span>
                    <a href="{{ route('productdetails')}}"><img src="{{ asset('public/assets/website/images/product3.png')}}" class="product-image" alt="Milk"></a>
                    <div class="product-title cardpadding">Amul Butter</div>
                    <div class="product-info cardpadding">100 gm</div>
                    <div class="price-container cardpadding">
                    <span class="price">
                            <span class="rupee-symbol">₹</span> 30
                        </span>
                        <span class="original-price">
                            <span class="rupee-symbol2">₹</span> 38
                        </span>                        
                        <button class="add-btn" onclick="convertToQty(this)">Add <img src="{{ asset('public/assets/website/images/cart.svg')}}" alt="" class="ms-2"></button>
                    </div>
                    <div class="store-info ">
                        <span>Ad </span>
                        <span>Chandrash Grocery</span>
                        <span>5 min </span>
                    </div>
                </div>
            </div>
            <div class="item">
            <div class="product-card p-0">
                    <span class="discount-label">20% Off</span>
                    <a href="{{ route('productdetails')}}"><img src="{{ asset('public/assets/website/images/product4.png')}}" class="product-image" alt="Milk"></a>
                    <div class="product-title cardpadding">Mother Dairy Toned Milk</div>
                    <div class="product-info cardpadding">500 ml</div>
                    <div class="price-container cardpadding">
                    <span class="price">
                            <span class="rupee-symbol">₹</span> 30
                        </span>
                        <span class="original-price">
                            <span class="rupee-symbol2">₹</span> 38
                        </span>                        
                        <button class="add-btn d-flex flex-column align-items-center position-relative" onclick="openPopup()">
                            <div class="d-flex align-items-center">
                                Add
                                <img src="{{ asset('public/assets/website/images/cart.svg')}}" alt="" class="ms-2">
                            </div>
                            <div class="cart-options text-black">5 Options</div>
                        </button>
                    </div>
                    <div class="store-info ">
                        <span>Ad </span>
                        <span>Chandrash Grocery</span>
                        <span>5 min </span>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="product-card p-0">
                    <span class="discount-label">20% Off</span>
                    <a href="{{ route('productdetails')}}"><img src="{{ asset('public/assets/website/images/product3.png')}}" class="product-image" alt="Milk"></a>
                    <div class="product-title cardpadding">Amul Butter</div>
                    <div class="product-info cardpadding">100 gm</div>
                    <div class="price-container cardpadding">
                    <span class="price">
                            <span class="rupee-symbol">₹</span> 30
                        </span>
                        <span class="original-price">
                            <span class="rupee-symbol2">₹</span> 38
                        </span>                        
                        <button class="add-btn" onclick="convertToQty(this)">Add <img src="{{ asset('public/assets/website/images/cart.svg')}}" alt="" class="ms-2"></button>
                    </div>
                    <div class="store-info ">
                        <span>Ad </span>
                        <span>Chandrash Grocery</span>
                        <span>5 min </span>
                    </div>
                </div>
            </div>
            <div class="item">
            <div class="product-card p-0">
                    <span class="discount-label">20% Off</span>
                    <a href="{{ route('productdetails')}}"><img src="{{ asset('public/assets/website/images/product4.png')}}" class="product-image" alt="Milk"></a>
                    <div class="product-title cardpadding">Mother Dairy Toned Milk</div>
                    <div class="product-info cardpadding">500 ml</div>
                    <div class="price-container cardpadding">
                    <span class="price">
                            <span class="rupee-symbol">₹</span> 30
                        </span>
                        <span class="original-price">
                            <span class="rupee-symbol2">₹</span> 38
                        </span>                        
                        <button class="add-btn d-flex flex-column align-items-center position-relative" onclick="openPopup()">
                            <div class="d-flex align-items-center">
                                Add
                                <img src="{{ asset('public/assets/website/images/cart.svg')}}" alt="" class="ms-2">
                            </div>
                            <div class="cart-options text-black">5 Options</div>
                        </button>
                    </div>
                    <div class="store-info ">
                        <span>Ad </span>
                        <span>Chandrash Grocery</span>
                        <span>5 min </span>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="product-card p-0">
                    <span class="discount-label">20% Off</span>
                    <a href="{{ route('productdetails')}}"><img src="{{ asset('public/assets/website/images/product3.png')}}" class="product-image" alt="Milk"></a>
                    <div class="product-title cardpadding">Amul Butter</div>
                    <div class="product-info cardpadding">100 gm</div>
                    <div class="price-container cardpadding">
                    <span class="price">
                            <span class="rupee-symbol">₹</span> 30
                        </span>
                        <span class="original-price">
                            <span class="rupee-symbol2">₹</span> 38
                        </span>                        
                        <button class="add-btn" onclick="convertToQty(this)">Add <img src="{{ asset('public/assets/website/images/cart.svg')}}" alt="" class="ms-2"></button>
                    </div>
                    <div class="store-info ">
                        <span>Ad </span>
                        <span>Chandrash Grocery</span>
                        <span>5 min </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="owl-carousel owl-theme">
            <div class="item">
                <div class="product-card p-0">
                    <span class="discount-label">20% Off</span>
                    <a href="{{ route('productdetails')}}"><img src="{{ asset('public/assets/website/images/product4.png')}}" class="product-image" alt="Milk"></a>
                    <div class="product-title cardpadding">Mother Dairy Toned Milk</div>
                    <div class="product-info cardpadding">500 ml</div>
                    <div class="price-container cardpadding">
                        <span class="price">
                            <span class="rupee-symbol">₹</span> 30
                        </span>
                        <span class="original-price">
                            <span class="rupee-symbol2">₹</span> 38
                        </span>                        
                        <button class="add-btn d-flex flex-column align-items-center position-relative" onclick="openPopup()">
                            <div class="d-flex align-items-center">
                                Add
                                <img src="{{ asset('public/assets/website/images/cart.svg')}}" alt="" class="ms-2">
                            </div>
                            <div class="cart-options text-black">5 Options</div>
                        </button>
                    </div>
                    <div class="store-info ">
                        <span>Ad </span>
                        <span>Chandrash Grocery</span>
                        <span>5 min </span>
                    </div>
                </div>                
            </div>
            <div class="item">
                <div class="product-card p-0">
                    <span class="discount-label">20% Off</span>
                    <a href="{{ route('productdetails')}}"><img src="{{ asset('public/assets/website/images/product3.png')}}" class="product-image" alt="Milk"></a>
                    <div class="product-title cardpadding">Amul Butter</div>
                    <div class="product-info cardpadding">100 gm</div>
                    <div class="price-container cardpadding">
                    <span class="price">
                            <span class="rupee-symbol">₹</span> 30
                        </span>
                        <span class="original-price">
                            <span class="rupee-symbol2">₹</span> 38
                        </span>                        
                        <button class="add-btn" onclick="convertToQty(this)">Add <img src="{{ asset('public/assets/website/images/cart.svg')}}" alt="" class="ms-2"></button>
                    </div>
                    <div class="store-info ">
                        <span>Ad </span>
                        <span>Chandrash Grocery</span>
                        <span>5 min </span>
                    </div>
                </div>
            </div>
            <div class="item">
            <div class="product-card p-0">
                    <span class="discount-label">20% Off</span>
                    <a href="{{ route('productdetails')}}"><img src="{{ asset('public/assets/website/images/product4.png')}}" class="product-image" alt="Milk"></a>
                    <div class="product-title cardpadding">Mother Dairy Toned Milk</div>
                    <div class="product-info cardpadding">500 ml</div>
                    <div class="price-container cardpadding">
                    <span class="price">
                            <span class="rupee-symbol">₹</span> 30
                        </span>
                        <span class="original-price">
                            <span class="rupee-symbol2">₹</span> 38
                        </span>                        
                        <button class="add-btn d-flex flex-column align-items-center position-relative" onclick="openPopup()">
                            <div class="d-flex align-items-center">
                                Add
                                <img src="{{ asset('public/assets/website/images/cart.svg')}}" alt="" class="ms-2">
                            </div>
                            <div class="cart-options text-black">5 Options</div>
                        </button>
                    </div>
                    <div class="store-info ">
                        <span>Ad </span>
                        <span>Chandrash Grocery</span>
                        <span>5 min </span>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="product-card p-0">
                    <span class="discount-label">20% Off</span>
                    <a href="{{ route('productdetails')}}"><img src="{{ asset('public/assets/website/images/product3.png')}}" class="product-image" alt="Milk"></a>
                    <div class="product-title cardpadding">Amul Butter</div>
                    <div class="product-info cardpadding">100 gm</div>
                    <div class="price-container cardpadding">
                    <span class="price">
                            <span class="rupee-symbol">₹</span> 30
                        </span>
                        <span class="original-price">
                            <span class="rupee-symbol2">₹</span> 38
                        </span>                        
                        <button class="add-btn" onclick="convertToQty(this)">Add <img src="{{ asset('public/assets/website/images/cart.svg')}}" alt="" class="ms-2"></button>
                    </div>
                    <div class="store-info ">
                        <span>Ad </span>
                        <span>Chandrash Grocery</span>
                        <span>5 min </span>
                    </div>
                </div>
            </div>
            <div class="item">
            <div class="product-card p-0">
                    <span class="discount-label">20% Off</span>
                    <a href="{{ route('productdetails')}}"><img src="{{ asset('public/assets/website/images/product4.png')}}" class="product-image" alt="Milk"></a>
                    <div class="product-title cardpadding">Mother Dairy Toned Milk</div>
                    <div class="product-info cardpadding">500 ml</div>
                    <div class="price-container cardpadding">
                    <span class="price">
                            <span class="rupee-symbol">₹</span> 30
                        </span>
                        <span class="original-price">
                            <span class="rupee-symbol2">₹</span> 38
                        </span>                        
                        <button class="add-btn d-flex flex-column align-items-center position-relative" onclick="openPopup()">
                            <div class="d-flex align-items-center">
                                Add
                                <img src="{{ asset('public/assets/website/images/cart.svg')}}" alt="" class="ms-2">
                            </div>
                            <div class="cart-options text-black">5 Options</div>
                        </button>
                    </div>
                    <div class="store-info ">
                        <span>Ad </span>
                        <span>Chandrash Grocery</span>
                        <span>5 min </span>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="product-card p-0">
                    <span class="discount-label">20% Off</span>
                    <a href="{{ route('productdetails')}}"><img src="{{ asset('public/assets/website/images/product3.png')}}" class="product-image" alt="Milk"></a>
                    <div class="product-title cardpadding">Amul Butter</div>
                    <div class="product-info cardpadding">100 gm</div>
                    <div class="price-container cardpadding">
                    <span class="price">
                            <span class="rupee-symbol">₹</span> 30
                        </span>
                        <span class="original-price">
                            <span class="rupee-symbol2">₹</span> 38
                        </span>                        
                        <button class="add-btn" onclick="convertToQty(this)">Add <img src="{{ asset('public/assets/website/images/cart.svg')}}" alt="" class="ms-2"></button>
                    </div>
                    <div class="store-info ">
                        <span>Ad </span>
                        <span>Chandrash Grocery</span>
                        <span>5 min </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center">
            <button class="view-all-btn mt-3">
                View All <i class="fa fa-angles-down ms-2"></i>
            </button>
        </div>
    </div>
    <!-- pop up of add button  -->
    <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="productModalLabel">Mother Dairy Milk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h6>Select Unit</h6>
                <div class="unit-list">
                    <div class="unit-item">
                        <img src="{{ asset('public/assets/website/images/category1.png')}}" class="unit-image" alt="Milk">
                        <span>100 ml</span>
                        <span class="pricepopup">
                            <span class="rupee-symbol">₹</span> 30
                        </span>
                        <span class="original-price">
                            <span class="rupee-symbol2">₹</span> 38
                        </span>
                       
                        <button class="add-btn" onclick="convertToQty(this)">Add <img src="{{ asset('public/assets/website/images/cart.svg')}}" alt="" class="ms-1"></button>
                    </div>
                    <div class="unit-item">
                        <img src="{{ asset('public/assets/website/images/category1.png')}}" class="unit-image" alt="Milk">
                        <span>500 ml</span>
                         <span class="pricepopup">
                            <span class="rupee-symbol">₹</span> 30
                        </span>
                        <span class="original-price">
                            <span class="rupee-symbol2">₹</span> 38
                        </span>
                        <button class="add-btn" onclick="convertToQty(this)">Add <img src="{{ asset('public/assets/website/images/cart.svg')}}" alt="" class="ms-1"></button>
                    </div>
                    <div class="unit-item">
                        <img src="{{ asset('public/assets/website/images/category1.png')}}" class="unit-image" alt="Milk">
                        <span>500 ml</span>
                         <span class="pricepopup">
                            <span class="rupee-symbol">₹</span> 30
                        </span>
                        <span class="original-price">
                            <span class="rupee-symbol2">₹</span> 38
                        </span>
                        <button class="add-btn" onclick="convertToQty(this)">Add <img src="{{ asset('public/assets/website/images/cart.svg')}}" alt="" class="ms-1"></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<!-- third section end  -->



<!-- fourth section start  -->
<section class="categoryfordesktop">
<div class="container new-cate-grocery-section">
        <div class="row align-items-center m-0">
            <!-- Left Promo Section -->
            <div class="col-md-4">
                <div class="new-cate-promo-box">
                    <h2>Grocery at your doorstep</h2>
                    <p>Your favorite vegetables, fruits & more</p>
                    <button class="btn btn-light">Order Now</button>
                    @php
                        $categoryBanner = collect($banners)->firstWhere('banner_cat_id', 3);
                    @endphp

                    @if($categoryBanner)
                        <img src="{{ asset('public/' . $categoryBanner['desktop_image']) }}" alt="Vegetables">
                    @endif

                </div>
            </div>

            <!-- Right Category Slider -->
            <div class="col-md-8 new-cate">
            <h4 class="py-3 m-0 new-cate-category-title headingclass">Categories</h4>
            <div class="new-cate-owl-carousel owl-carousel owl-theme">
                        @foreach($categories->chunk(2) as $chunk)
                            <div class="new-cate-item p-0">
                                @foreach($chunk as $cat)
                                    <div class="product-carded">
                                        <img src="{{ asset('public/'.$cat->image) }}" alt="{{ $cat['name'] }}">
                                    </div>
                                    <div class="py-2 text-center catename"><b>{{ $cat['name'] }}</b></div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
            </div>
        </div>
    </div> 
</section>




<!-- category section for mobile screen  -->
<section class="categoryformobile">
<div class="container new-cate-grocery-section">
        <div class="row align-items-center m-0">
            <!-- Left Promo Section -->
            <div class="col-md-4">
                <div class="new-cate-promo-box">
                    <h2>Grocery at your doorstep</h2>
                    <p>Your favorite vegetables, fruits & more</p>
                    <button class="btn btn-light">Order Now</button>
                    <img src="{{ asset('public/assets/website/images/bannerproduct.png')}}" alt="Vegetables">
                </div>
            </div>

            <!-- Right Category Slider -->
            <div class="col-md-8 new-cate">
                <h4 class="pb-3 new-cate-category-title headingclass">Categories</h4>
                <div class="row" id="category-container">
                    <!-- Repeat this block for all your categories (add as many as you want, for demo 18) -->
                    <div class="col-md-4 col-4 new-cate-item-wrap">
                        <div class="new-cate-item">
                            <div class="product-carded">
                                <img src="{{ asset('public/assets/website/images/category1.png')}}" alt="Category">                            
                            </div>
                            <div class="py-2 text-center catename"><b>Bakery</b></div>
                        </div>
                    </div>
                    <div class="col-md-4 col-4 new-cate-item-wrap">
                        <div class="new-cate-item">
                            <div class="product-carded">
                                <img src="{{ asset('public/assets/website/images/category2.png')}}" alt="Category">                            
                            </div>
                            <div class="py-2 text-center catename"><b>Bakery</b></div>
                        </div>
                    </div>
                    <div class="col-md-4 col-4 new-cate-item-wrap">
                        <div class="new-cate-item">
                            <div class="product-carded">
                                <img src="{{ asset('public/assets/website/images/category3.png')}}" alt="Category">                            
                            </div>
                            <div class="py-2 text-center catename"><b>Bakery</b></div>
                        </div>
                    </div>
                    <div class="col-md-4 col-4 new-cate-item-wrap">
                        <div class="new-cate-item">
                            <div class="product-carded">
                                <img src="{{ asset('public/assets/website/images/category4.png')}}" alt="Category">                            
                            </div>
                            <div class="py-2 text-center catename"><b>Bakery</b></div>
                        </div>
                    </div>
                    <div class="col-md-4 col-4 new-cate-item-wrap">
                        <div class="new-cate-item">
                            <div class="product-carded">
                                <img src="{{ asset('public/assets/website/images/category5.png')}}" alt="Category">                            
                            </div>
                            <div class="py-2 text-center catename"><b>Bakery</b></div>
                        </div>
                    </div>
                    <div class="col-md-4 col-4 new-cate-item-wrap">
                        <div class="new-cate-item">
                            <div class="product-carded">
                                <img src="{{ asset('public/assets/website/images/category6.png')}}" alt="Category">                            
                            </div>
                            <div class="py-2 text-center catename"><b>Bakery</b></div>
                        </div>
                    </div>
                    <div class="col-md-4 col-4 new-cate-item-wrap">
                        <div class="new-cate-item">
                            <div class="product-carded">
                                <img src="{{ asset('public/assets/website/images/category7.png')}}" alt="Category">                            
                            </div>
                            <div class="py-2 text-center catename"><b>Bakery</b></div>
                        </div>
                    </div>
                    <div class="col-md-4 col-4 new-cate-item-wrap">
                        <div class="new-cate-item">
                            <div class="product-carded">
                                <img src="{{ asset('public/assets/website/images/category8.png')}}" alt="Category">                            
                            </div>
                            <div class="py-2 text-center catename"><b>Bakery</b></div>
                        </div>
                    </div>
                    <div class="col-md-4 col-4 new-cate-item-wrap">
                        <div class="new-cate-item">
                            <div class="product-carded">
                                <img src="{{ asset('public/assets/website/images/category1.png')}}" alt="Category">                            
                            </div>
                            <div class="py-2 text-center catename"><b>Bakery</b></div>
                        </div>
                    </div>
                    <div class="col-md-4 col-4 new-cate-item-wrap">
                        <div class="new-cate-item">
                            <div class="product-carded">
                                <img src="{{ asset('public/assets/website/images/category2.png')}}" alt="Category">                            
                            </div>
                            <div class="py-2 text-center catename"><b>Bakery</b></div>
                        </div>
                    </div>
                    <div class="col-md-4 col-4 new-cate-item-wrap">
                        <div class="new-cate-item">
                            <div class="product-carded">
                                <img src="{{ asset('public/assets/website/images/category3.png')}}" alt="Category">                            
                            </div>
                            <div class="py-2 text-center catename"><b>Bakery</b></div>
                        </div>
                    </div>
                    <div class="col-md-4 col-4 new-cate-item-wrap">
                        <div class="new-cate-item">
                            <div class="product-carded">
                                <img src="{{ asset('public/assets/website/images/category4.png')}}" alt="Category">                            
                            </div>
                            <div class="py-2 text-center catename"><b>Bakery</b></div>
                        </div>
                    </div>
                    <div class="col-md-4 col-4 new-cate-item-wrap">
                        <div class="new-cate-item">
                            <div class="product-carded">
                                <img src="{{ asset('public/assets/website/images/category5.png')}}" alt="Category">                            
                            </div>
                            <div class="py-2 text-center catename"><b>Bakery</b></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <button class="view-all-btn mt-3" id="loadMoreBtn">
                    Load More <i class="fa fa-angles-down ms-2"></i>
                </button>
            </div>
    </div> 
</section>
<!-- fourth section end  -->
<!-- fifth section start  -->
<section class="">
        <div class="container">
        <h4 class="pb-3 pt-4 headingclass">Stores</h4>
            <div class="row justify-content-center">
                <!-- Store Item -->
                 @if($stores)

                 @foreach($stores as $store)
                <div class="col-md-2 col-4 store-item">
                    <div class="store-image">
                        @php
                            $imagePath = public_path($store->business_logo);
                            $imageUrl = file_exists($imagePath) ? asset('public/' . $store->business_logo) : asset('public/uploads/no-image.jpg');
                        @endphp

                        <img src="{{ $imageUrl }}" alt="Store">
                    </div>
                    <div class="store-name">{{$store->business_name}}</div>
                    <a href="#">Grocery</a>
                    <div class="store-discount">Upto 28% Off</div>
                </div>
                @endforeach
                @endif
                <!-- <div class="col-md-2 col-4 store-item">
                    <div class="store-image">
                        <img src="{{ asset('public/assets/website/images/store2.jpg')}}" alt="Store">
                    </div>
                    <div class="store-name">Tushar Grocery</div>
                    <a href="#">Restaurant</a>
                    <div class="store-discount">Upto 32% Off</div>
                </div>

                <div class="col-md-2 col-4 store-item">
                    <div class="store-image">
                        <img src="{{ asset('public/assets/website/images/store3.jpg')}}" alt="Store">
                    </div>
                    <div class="store-name">Rakesh Grocery</div>
                    <a href="#">Fruits</a>
                    <div class="store-discount">Upto 48% Off</div>
                </div>

                <div class="col-md-2 col-4 store-item">
                    <div class="store-image">
                        <img src="{{ asset('public/assets/website/images/store2.jpg')}}" alt="Store">
                    </div>
                    <div class="store-name">Chandresh Grocery</div>
                    <a href="#">Fruits</a>
                    <div class="store-discount">Upto 10% Off</div>
                </div>

                <div class="col-md-2 col-4 store-item">
                    <div class="store-image">
                        <img src="{{ asset('public/assets/website/images/store3.jpg')}}" alt="Store">
                    </div>
                    <div class="store-name">Irfan Grocery</div>
                    <a href="#">Vegetable</a>
                    <div class="store-discount">Upto 70% Off</div>
                </div>

                <div class="col-md-2 col-4 store-item">
                    <div class="store-image">
                        <img src="{{ asset('public/assets/website/images/store2.jpg')}}" alt="Store">
                    </div>
                    <div class="store-name">Ritik Grocery</div>
                    <a href="#">Grocery</a>
                    <div class="store-discount">Upto 20% Off</div>
                </div> -->
            </div>

            <!-- View All Button -->
            <div class="text-center">
            <button class="view-all-btn mt-3">
                View All <i class="fa fa-angles-down ms-2"></i>
            </button>
        </div>
        </div>
    </section>

<!-- fifth section end   -->
<!-- sixth section start  -->
<section>
<div class="container mt-4">
<h4 class="pb-3 pt-4 headingclass">Snacks</h4>
        <div class="owl-carousel owl-theme mb-4">
            <div class="item">
                <div class="product-card p-0">
                    <span class="discount-label">20% Off</span>
                    <a href="{{ route('productdetails')}}"><img src="{{ asset('public/assets/website/images/product4.png')}}" class="product-image" alt="Milk"></a>
                    <div class="product-title cardpadding">Mother Dairy Toned Milk</div>
                    <div class="product-info cardpadding">500 ml</div>
                    <div class="price-container cardpadding">
                    <span class="price">
                            <span class="rupee-symbol">₹</span> 30
                        </span>
                        <span class="original-price">
                            <span class="rupee-symbol2">₹</span> 38
                        </span>                        
                        <button class="add-btn d-flex flex-column align-items-center position-relative" onclick="openPopup()">
                            <div class="d-flex align-items-center">
                                Add
                                <img src="{{ asset('public/assets/website/images/cart.svg')}}" alt="" class="ms-2">
                            </div>
                            <div class="cart-options text-black">5 Options</div>
                        </button>
                    </div>
                    <div class="store-info ">
                        <span>Ad </span>
                        <span>Chandrash Grocery</span>
                        <span>5 min </span>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="product-card p-0">
                    <span class="discount-label">20% Off</span>
                    <a href="{{ route('productdetails')}}"><img src="{{ asset('public/assets/website/images/product3.png')}}" class="product-image" alt="Milk"></a>
                    <div class="product-title cardpadding">Amul Butter</div>
                    <div class="product-info cardpadding">100 gm</div>
                    <div class="price-container cardpadding">
                    <span class="price">
                            <span class="rupee-symbol">₹</span> 30
                        </span>
                        <span class="original-price">
                            <span class="rupee-symbol2">₹</span> 38
                        </span>                        
                        <button class="add-btn" onclick="convertToQty(this)">Add <img src="{{ asset('public/assets/website/images/cart.svg')}}" alt="" class="ms-2"></button>
                    </div>
                    <div class="store-info ">
                        <span>Ad </span>
                        <span>Chandrash Grocery</span>
                        <span>5 min </span>
                    </div>
                </div>
            </div>
            <div class="item">
            <div class="product-card p-0">
                    <span class="discount-label">20% Off</span>
                    <a href="{{ route('productdetails')}}"><img src="{{ asset('public/assets/website/images/product6.png')}}" class="product-image" alt="Milk"></a>
                    <div class="product-title cardpadding">Mother Dairy Toned Milk</div>
                    <div class="product-info cardpadding">500 ml</div>
                    <div class="price-container cardpadding">
                    <span class="price">
                            <span class="rupee-symbol">₹</span> 30
                        </span>
                        <span class="original-price">
                            <span class="rupee-symbol2">₹</span> 38
                        </span>                        
                        <button class="add-btn d-flex flex-column align-items-center position-relative" onclick="openPopup()">
                            <div class="d-flex align-items-center">
                                Add
                                <img src="{{ asset('public/assets/website/images/cart.svg')}}" alt="" class="ms-2">
                            </div>
                            <div class="cart-options text-black">5 Options</div>
                        </button>
                    </div>
                    <div class="store-info ">
                        <span>Ad </span>
                        <span>Chandrash Grocery</span>
                        <span>5 min </span>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="product-card p-0">
                    <span class="discount-label">20% Off</span>
                    <a href="{{ route('productdetails')}}"><img src="{{ asset('public/assets/website/images/product5.png')}}" class="product-image" alt="Milk"></a>
                    <div class="product-title cardpadding">Amul Butter</div>
                    <div class="product-info cardpadding">100 gm</div>
                    <div class="price-container cardpadding">
                    <span class="price">
                            <span class="rupee-symbol">₹</span> 30
                        </span>
                        <span class="original-price">
                            <span class="rupee-symbol2">₹</span> 38
                        </span>                        
                        <button class="add-btn" onclick="convertToQty(this)">Add <img src="{{ asset('public/assets/website/images/cart.svg')}}" alt="" class="ms-2"></button>
                    </div>
                    <div class="store-info ">
                        <span>Ad </span>
                        <span>Chandrash Grocery</span>
                        <span>5 min </span>
                    </div>
                </div>
            </div>
            <div class="item">
            <div class="product-card p-0">
                    <span class="discount-label">20% Off</span>
                    <a href="{{ route('productdetails')}}"><img src="{{ asset('public/assets/website/images/product6.png')}}" class="product-image" alt="Milk"></a>
                    <div class="product-title cardpadding">Mother Dairy Toned Milk</div>
                    <div class="product-info cardpadding">500 ml</div>
                    <div class="price-container cardpadding">
                    <span class="price">
                            <span class="rupee-symbol">₹</span> 30
                        </span>
                        <span class="original-price">
                            <span class="rupee-symbol2">₹</span> 38
                        </span>                        
                        <button class="add-btn d-flex flex-column align-items-center position-relative" onclick="openPopup()">
                            <div class="d-flex align-items-center">
                                Add
                                <img src="{{ asset('public/assets/website/images/cart.svg')}}" alt="" class="ms-2">
                            </div>
                            <div class="cart-options text-black">5 Options</div>
                        </button>
                    </div>
                    <div class="store-info ">
                        <span>Ad </span>
                        <span>Chandrash Grocery</span>
                        <span>5 min </span>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="product-card p-0">
                    <span class="discount-label">20% Off</span>
                    <a href="{{ route('productdetails')}}"><img src="{{ asset('public/assets/website/images/product5.png')}}" class="product-image" alt="Milk"></a>
                    <div class="product-title cardpadding">Amul Butter</div>
                    <div class="product-info cardpadding">100 gm</div>
                    <div class="price-container cardpadding">
                    <span class="price">
                            <span class="rupee-symbol">₹</span> 30
                        </span>
                        <span class="original-price">
                            <span class="rupee-symbol2">₹</span> 38
                        </span>                        
                        <button class="add-btn" onclick="convertToQty(this)">Add <img src="{{ asset('public/assets/website/images/cart.svg')}}" alt="" class="ms-2"></button>
                    </div>
                    <div class="store-info ">
                        <span>Ad </span>
                        <span>Chandrash Grocery</span>
                        <span>5 min </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="owl-carousel owl-theme">
            <div class="item">
                <div class="product-card p-0">
                    <span class="discount-label">20% Off</span>
                    <a href="{{ route('productdetails')}}"><img src="{{ asset('public/assets/website/images/product4.png')}}" class="product-image" alt="Milk"></a>
                    <div class="product-title cardpadding">Mother Dairy Toned Milk</div>
                    <div class="product-info cardpadding">500 ml</div>
                    <div class="price-container cardpadding">
                        <span class="price">
                            <span class="rupee-symbol">₹</span> 30
                        </span>
                        <span class="original-price">
                            <span class="rupee-symbol2">₹</span> 38
                        </span>                        
                        <button class="add-btn d-flex flex-column align-items-center position-relative" onclick="openPopup()">
                            <div class="d-flex align-items-center">
                                Add
                                <img src="{{ asset('public/assets/website/images/cart.svg')}}" alt="" class="ms-2">
                            </div>
                            <div class="cart-options text-black">5 Options</div>
                        </button>
                    </div>
                    <div class="store-info ">
                        <span>Ad </span>
                        <span>Chandrash Grocery</span>
                        <span>5 min </span>
                    </div>
                </div>                
            </div>
            <div class="item">
                <div class="product-card p-0">
                    <span class="discount-label">20% Off</span>
                    <a href="{{ route('productdetails')}}"><img src="{{ asset('public/assets/website/images/product3.png')}}" class="product-image" alt="Milk"></a>
                    <div class="product-title cardpadding">Amul Butter</div>
                    <div class="product-info cardpadding">100 gm</div>
                    <div class="price-container cardpadding">
                    <span class="price">
                            <span class="rupee-symbol">₹</span> 30
                        </span>
                        <span class="original-price">
                            <span class="rupee-symbol2">₹</span> 38
                        </span>                        
                        <button class="add-btn" onclick="convertToQty(this)">Add <img src="{{ asset('public/assets/website/images/cart.svg')}}" alt="" class="ms-2"></button>
                    </div>
                    <div class="store-info ">
                        <span>Ad </span>
                        <span>Chandrash Grocery</span>
                        <span>5 min </span>
                    </div>
                </div>
            </div>
            <div class="item">
            <div class="product-card p-0">
                    <span class="discount-label">20% Off</span>
                    <a href="{{ route('productdetails')}}"><img src="{{ asset('public/assets/website/images/product4.png')}}" class="product-image" alt="Milk"></a>
                    <div class="product-title cardpadding">Mother Dairy Toned Milk</div>
                    <div class="product-info cardpadding">500 ml</div>
                    <div class="price-container cardpadding">
                    <span class="price">
                            <span class="rupee-symbol">₹</span> 30
                        </span>
                        <span class="original-price">
                            <span class="rupee-symbol2">₹</span> 38
                        </span>                        
                        <button class="add-btn d-flex flex-column align-items-center position-relative" onclick="openPopup()">
                            <div class="d-flex align-items-center">
                                Add
                                <img src="{{ asset('public/assets/website/images/cart.svg')}}" alt="" class="ms-2">
                            </div>
                            <div class="cart-options text-black">5 Options</div>
                        </button>
                    </div>
                    <div class="store-info ">
                        <span>Ad </span>
                        <span>Chandrash Grocery</span>
                        <span>5 min </span>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="product-card p-0">
                    <span class="discount-label">20% Off</span>
                    <a href="{{ route('productdetails')}}"><img src="{{ asset('public/assets/website/images/product3.png')}}" class="product-image" alt="Milk"></a>
                    <div class="product-title cardpadding">Amul Butter</div>
                    <div class="product-info cardpadding">100 gm</div>
                    <div class="price-container cardpadding">
                    <span class="price">
                            <span class="rupee-symbol">₹</span> 30
                        </span>
                        <span class="original-price">
                            <span class="rupee-symbol2">₹</span> 38
                        </span>                        
                        <button class="add-btn" onclick="convertToQty(this)">Add <img src="{{ asset('public/assets/website/images/cart.svg')}}" alt="" class="ms-2"></button>
                    </div>
                    <div class="store-info ">
                        <span>Ad </span>
                        <span>Chandrash Grocery</span>
                        <span>5 min </span>
                    </div>
                </div>
            </div>
            <div class="item">
            <div class="product-card p-0">
                    <span class="discount-label">20% Off</span>
                    <a href="{{ route('productdetails')}}"><img src="{{ asset('public/assets/website/images/product4.png')}}" class="product-image" alt="Milk"></a>
                    <div class="product-title cardpadding">Mother Dairy Toned Milk</div>
                    <div class="product-info cardpadding">500 ml</div>
                    <div class="price-container cardpadding">
                    <span class="price">
                            <span class="rupee-symbol">₹</span> 30
                        </span>
                        <span class="original-price">
                            <span class="rupee-symbol2">₹</span> 38
                        </span>                        
                        <button class="add-btn d-flex flex-column align-items-center position-relative" onclick="openPopup()">
                            <div class="d-flex align-items-center">
                                Add
                                <img src="{{ asset('public/assets/website/images/cart.svg')}}" alt="" class="ms-2">
                            </div>
                            <div class="cart-options text-black">5 Options</div>
                        </button>
                    </div>
                    <div class="store-info ">
                        <span>Ad </span>
                        <span>Chandrash Grocery</span>
                        <span>5 min </span>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="product-card p-0">
                    <span class="discount-label">20% Off</span>
                    <a href="{{ route('productdetails')}}"><img src="{{ asset('public/assets/website/images/product3.png')}}" class="product-image" alt="Milk"></a>
                    <div class="product-title cardpadding">Amul Butter</div>
                    <div class="product-info cardpadding">100 gm</div>
                    <div class="price-container cardpadding">
                    <span class="price">
                            <span class="rupee-symbol">₹</span> 30
                        </span>
                        <span class="original-price">
                            <span class="rupee-symbol2">₹</span> 38
                        </span>                        
                        <button class="add-btn" onclick="convertToQty(this)">Add <img src="{{ asset('public/assets/website/images/cart.svg')}}" alt="" class="ms-2"></button>
                    </div>
                    <div class="store-info ">
                        <span>Ad </span>
                        <span>Chandrash Grocery</span>
                        <span>5 min </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center">
            <button class="view-all-btn mt-3">
                View All <i class="fa fa-angles-down ms-2"></i>
            </button>
        </div>
    </div>
    <!-- pop up of add button  -->
    <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="productModalLabel">Mother Dairy Milk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h6>Select Unit</h6>
                <div class="unit-list">
                    <div class="unit-item">
                        <img src="{{ asset('public/assets/website/images/category1.png')}}" class="unit-image" alt="Milk">
                        <span>100 ml</span>
                        <span class="original-price">₹ 12</span>
                        <span class="price text-success">₹ 10</span>
                        <button class="add-btn" onclick="convertToQty(this)">Add <i class="fas fa-shopping-cart"></i></button>
                    </div>
                    <div class="unit-item">
                        <img src="{{ asset('public/assets/website/images/category1.png')}}" class="unit-image" alt="Milk">
                        <span>500 ml</span>
                        <span class="original-price">₹ 32</span>
                        <span class="price text-success">₹ 30</span>
                        <button class="add-btn" onclick="convertToQty(this)">Add <i class="fas fa-shopping-cart"></i></button>
                    </div>
                    <div class="unit-item">
                        <img src="{{ asset('public/assets/website/images/category1.png')}}" class="unit-image" alt="Milk">
                        <span>1 Lt</span>
                        <span class="original-price">₹ 58</span>
                        <span class="price text-success">₹ 55</span>
                        <button class="add-btn" onclick="convertToQty(this)">Add <i class="fas fa-shopping-cart"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<!-- sixth section end  -->
<!-- seventh section start  -->
<section>
<div class="container mt-4">
    <h4 class="pb-3 pt-4 headingclass">Daily Needs</h4>
    <div class="owl-carousel owl-theme mb-4">
            <div class="item">
                <div class="product-card p-0">
                    <span class="discount-label">20% Off</span>
                    <a href="{{ route('productdetails')}}"><img src="{{ asset('public/assets/website/images/product9.png')}}" class="product-image" alt="Milk"></a>
                    <div class="product-title cardpadding">Mother Dairy Toned Milk</div>
                    <div class="product-info cardpadding">500 ml</div>
                    <div class="price-container cardpadding">
                    <span class="price">
                            <span class="rupee-symbol">₹</span> 30
                        </span>
                        <span class="original-price">
                            <span class="rupee-symbol2">₹</span> 38
                        </span>                        
                        <button class="add-btn d-flex flex-column align-items-center position-relative" onclick="openPopup()">
                            <div class="d-flex align-items-center">
                                Add
                                <img src="{{ asset('public/assets/website/images/cart.svg')}}" alt="" class="ms-2">
                            </div>
                            <div class="cart-options text-black">5 Options</div>
                        </button>
                    </div>
                    <div class="store-info ">
                        <span>Ad </span>
                        <span>Chandrash Grocery</span>
                        <span>5 min </span>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="product-card p-0">
                    <span class="discount-label">20% Off</span>
                    <a href="{{ route('productdetails')}}"><img src="{{ asset('public/assets/website/images/product10.png')}}" class="product-image" alt="Milk"></a>
                    <div class="product-title cardpadding">Amul Butter</div>
                    <div class="product-info cardpadding">100 gm</div>
                    <div class="price-container cardpadding">
                    <span class="price">
                            <span class="rupee-symbol">₹</span> 30
                        </span>
                        <span class="original-price">
                            <span class="rupee-symbol2">₹</span> 38
                        </span>                        
                        <button class="add-btn" onclick="convertToQty(this)">Add <img src="{{ asset('public/assets/website/images/cart.svg')}}" alt="" class="ms-2"></button>
                    </div>
                    <div class="store-info ">
                        <span>Ad </span>
                        <span>Chandrash Grocery</span>
                        <span>5 min </span>
                    </div>
                </div>
            </div>
            <div class="item">
            <div class="product-card p-0">
                    <span class="discount-label">20% Off</span>
                    <a href="{{ route('productdetails')}}"><img src="{{ asset('public/assets/website/images/product11.png')}}" class="product-image" alt="Milk"></a>
                    <div class="product-title cardpadding">Mother Dairy Toned Milk</div>
                    <div class="product-info cardpadding">500 ml</div>
                    <div class="price-container cardpadding">
                    <span class="price">
                            <span class="rupee-symbol">₹</span> 30
                        </span>
                        <span class="original-price">
                            <span class="rupee-symbol2">₹</span> 38
                        </span>                        
                        <button class="add-btn d-flex flex-column align-items-center position-relative" onclick="openPopup()">
                            <div class="d-flex align-items-center">
                                Add
                                <img src="{{ asset('public/assets/website/images/cart.svg')}}" alt="" class="ms-2">
                            </div>
                            <div class="cart-options text-black">5 Options</div>
                        </button>
                    </div>
                    <div class="store-info ">
                        <span>Ad </span>
                        <span>Chandrash Grocery</span>
                        <span>5 min </span>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="product-card p-0">
                    <span class="discount-label">20% Off</span>
                    <a href="{{ route('productdetails')}}"><img src="{{ asset('public/assets/website/images/product12.png')}}" class="product-image" alt="Milk"></a>
                    <div class="product-title cardpadding">Amul Butter</div>
                    <div class="product-info cardpadding">100 gm</div>
                    <div class="price-container cardpadding">
                    <span class="price">
                            <span class="rupee-symbol">₹</span> 30
                        </span>
                        <span class="original-price">
                            <span class="rupee-symbol2">₹</span> 38
                        </span>                        
                        <button class="add-btn" onclick="convertToQty(this)">Add <img src="{{ asset('public/assets/website/images/cart.svg')}}" alt="" class="ms-2"></button>
                    </div>
                    <div class="store-info ">
                        <span>Ad </span>
                        <span>Chandrash Grocery</span>
                        <span>5 min </span>
                    </div>
                </div>
            </div>
            <div class="item">
            <div class="product-card p-0">
                    <span class="discount-label">20% Off</span>
                    <a href="{{ route('productdetails')}}"><img src="{{ asset('public/assets/website/images/product8.png')}}" class="product-image" alt="Milk"></a>
                    <div class="product-title cardpadding">Mother Dairy Toned Milk</div>
                    <div class="product-info cardpadding">500 ml</div>
                    <div class="price-container cardpadding">
                    <span class="price">
                            <span class="rupee-symbol">₹</span> 30
                        </span>
                        <span class="original-price">
                            <span class="rupee-symbol2">₹</span> 38
                        </span>                        
                        <button class="add-btn d-flex flex-column align-items-center position-relative" onclick="openPopup()">
                            <div class="d-flex align-items-center">
                                Add
                                <img src="{{ asset('public/assets/website/images/cart.svg')}}" alt="" class="ms-2">
                            </div>
                            <div class="cart-options text-black">5 Options</div>
                        </button>
                    </div>
                    <div class="store-info ">
                        <span>Ad </span>
                        <span>Chandrash Grocery</span>
                        <span>5 min </span>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="product-card p-0">
                    <span class="discount-label">20% Off</span>
                    <a href="{{ route('productdetails')}}"><img src="{{ asset('public/assets/website/images/product9.png')}}" class="product-image" alt="Milk"></a>
                    <div class="product-title cardpadding">Amul Butter</div>
                    <div class="product-info cardpadding">100 gm</div>
                    <div class="price-container cardpadding">
                    <span class="price">
                            <span class="rupee-symbol">₹</span> 30
                        </span>
                        <span class="original-price">
                            <span class="rupee-symbol2">₹</span> 38
                        </span>                        
                        <button class="add-btn" onclick="convertToQty(this)">Add <img src="{{ asset('public/assets/website/images/cart.svg')}}" alt="" class="ms-2"></button>
                    </div>
                    <div class="store-info ">
                        <span>Ad </span>
                        <span>Chandrash Grocery</span>
                        <span>5 min </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="owl-carousel owl-theme">
            <div class="item">
                <div class="product-card p-0">
                    <span class="discount-label">20% Off</span>
                    <a href="{{ route('productdetails')}}"><img src="{{ asset('public/assets/website/images/product4.png')}}" class="product-image" alt="Milk"></a>
                    <div class="product-title cardpadding">Mother Dairy Toned Milk</div>
                    <div class="product-info cardpadding">500 ml</div>
                    <div class="price-container cardpadding">
                        <span class="price">
                            <span class="rupee-symbol">₹</span> 30
                        </span>
                        <span class="original-price">
                            <span class="rupee-symbol2">₹</span> 38
                        </span>                        
                        <button class="add-btn d-flex flex-column align-items-center position-relative" onclick="openPopup()">
                            <div class="d-flex align-items-center">
                                Add
                                <img src="{{ asset('public/assets/website/images/cart.svg')}}" alt="" class="ms-2">
                            </div>
                            <div class="cart-options text-black">5 Options</div>
                        </button>
                    </div>
                    <div class="store-info ">
                        <span>Ad </span>
                        <span>Chandrash Grocery</span>
                        <span>5 min </span>
                    </div>
                </div>                
            </div>
            <div class="item">
                <div class="product-card p-0">
                    <span class="discount-label">20% Off</span>
                    <a href="{{ route('productdetails')}}"><img src="{{ asset('public/assets/website/images/product3.png')}}" class="product-image" alt="Milk"></a>
                    <div class="product-title cardpadding">Amul Butter</div>
                    <div class="product-info cardpadding">100 gm</div>
                    <div class="price-container cardpadding">
                    <span class="price">
                            <span class="rupee-symbol">₹</span> 30
                        </span>
                        <span class="original-price">
                            <span class="rupee-symbol2">₹</span> 38
                        </span>                        
                        <button class="add-btn" onclick="convertToQty(this)">Add <img src="{{ asset('public/assets/website/images/cart.svg')}}" alt="" class="ms-2"></button>
                    </div>
                    <div class="store-info ">
                        <span>Ad </span>
                        <span>Chandrash Grocery</span>
                        <span>5 min </span>
                    </div>
                </div>
            </div>
            <div class="item">
            <div class="product-card p-0">
                    <span class="discount-label">20% Off</span>
                    <a href="{{ route('productdetails')}}"><img src="{{ asset('public/assets/website/images/product4.png')}}" class="product-image" alt="Milk"></a>
                    <div class="product-title cardpadding">Mother Dairy Toned Milk</div>
                    <div class="product-info cardpadding">500 ml</div>
                    <div class="price-container cardpadding">
                    <span class="price">
                            <span class="rupee-symbol">₹</span> 30
                        </span>
                        <span class="original-price">
                            <span class="rupee-symbol2">₹</span> 38
                        </span>                        
                        <button class="add-btn d-flex flex-column align-items-center position-relative" onclick="openPopup()">
                            <div class="d-flex align-items-center">
                                Add
                                <img src="{{ asset('public/assets/website/images/cart.svg')}}" alt="" class="ms-2">
                            </div>
                            <div class="cart-options text-black">5 Options</div>
                        </button>
                    </div>
                    <div class="store-info ">
                        <span>Ad </span>
                        <span>Chandrash Grocery</span>
                        <span>5 min </span>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="product-card p-0">
                    <span class="discount-label">20% Off</span>
                    <a href="{{ route('productdetails')}}"><img src="{{ asset('public/assets/website/images/product3.png')}}" class="product-image" alt="Milk"></a>
                    <div class="product-title cardpadding">Amul Butter</div>
                    <div class="product-info cardpadding">100 gm</div>
                    <div class="price-container cardpadding">
                    <span class="price">
                            <span class="rupee-symbol">₹</span> 30
                        </span>
                        <span class="original-price">
                            <span class="rupee-symbol2">₹</span> 38
                        </span>                        
                        <button class="add-btn" onclick="convertToQty(this)">Add <img src="{{ asset('public/assets/website/images/cart.svg')}}" alt="" class="ms-2"></button>
                    </div>
                    <div class="store-info ">
                        <span>Ad </span>
                        <span>Chandrash Grocery</span>
                        <span>5 min </span>
                    </div>
                </div>
            </div>
            <div class="item">
            <div class="product-card p-0">
                    <span class="discount-label">20% Off</span>
                    <a href="{{ route('productdetails')}}"><img src="{{ asset('public/assets/website/images/product4.png')}}" class="product-image" alt="Milk"></a>
                    <div class="product-title cardpadding">Mother Dairy Toned Milk</div>
                    <div class="product-info cardpadding">500 ml</div>
                    <div class="price-container cardpadding">
                    <span class="price">
                            <span class="rupee-symbol">₹</span> 30
                        </span>
                        <span class="original-price">
                            <span class="rupee-symbol2">₹</span> 38
                        </span>                        
                        <button class="add-btn d-flex flex-column align-items-center position-relative" onclick="openPopup()">
                            <div class="d-flex align-items-center">
                                Add
                                <img src="{{ asset('public/assets/website/images/cart.svg')}}" alt="" class="ms-2">
                            </div>
                            <div class="cart-options text-black">5 Options</div>
                        </button>
                    </div>
                    <div class="store-info ">
                        <span>Ad </span>
                        <span>Chandrash Grocery</span>
                        <span>5 min </span>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="product-card p-0">
                    <span class="discount-label">20% Off</span>
                    <a href="{{ route('productdetails')}}"><img src="{{ asset('public/assets/website/images/product3.png')}}" class="product-image" alt="Milk"></a>
                    <div class="product-title cardpadding">Amul Butter</div>
                    <div class="product-info cardpadding">100 gm</div>
                    <div class="price-container cardpadding">
                    <span class="price">
                            <span class="rupee-symbol">₹</span> 30
                        </span>
                        <span class="original-price">
                            <span class="rupee-symbol2">₹</span> 38
                        </span>                        
                        <button class="add-btn" onclick="convertToQty(this)">Add <img src="{{ asset('public/assets/website/images/cart.svg')}}" alt="" class="ms-2"></button>
                    </div>
                    <div class="store-info ">
                        <span>Ad </span>
                        <span>Chandrash Grocery</span>
                        <span>5 min </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center">
            <button class="view-all-btn mt-3">
                View All <i class="fa fa-angles-down ms-2"></i>
            </button>
        </div>
    </div>
    <!-- pop up of add button  -->
    <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="productModalLabel">Mother Dairy Milk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h6>Select Unit</h6>
                <div class="unit-list">
                    <div class="unit-item">
                        <img src="{{ asset('public/assets/website/images/category1.png')}}" class="unit-image" alt="Milk">
                        <span>100 ml</span>
                        <span class="original-price">₹ 12</span>
                        <span class="price text-success">₹ 10</span>
                        <button class="add-btn" onclick="convertToQty(this)">Add <i class="fas fa-shopping-cart"></i></button>
                    </div>
                    <div class="unit-item">
                        <img src="{{ asset('public/assets/website/images/category1.png')}}" class="unit-image" alt="Milk">
                        <span>500 ml</span>
                        <span class="original-price">₹ 32</span>
                        <span class="price text-success">₹ 30</span>
                        <button class="add-btn" onclick="convertToQty(this)">Add <i class="fas fa-shopping-cart"></i></button>
                    </div>
                    <div class="unit-item">
                        <img src="{{ asset('public/assets/website/images/category1.png')}}" class="unit-image" alt="Milk">
                        <span>1 Lt</span>
                        <span class="original-price">₹ 58</span>
                        <span class="price text-success">₹ 55</span>
                        <button class="add-btn" onclick="convertToQty(this)">Add <i class="fas fa-shopping-cart"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<!-- seventh section end  -->

@endsection
