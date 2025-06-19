<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kwiklly</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{ asset('public/assets/website/CSS/style.css')}}">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
</head>
<style>
    .change-link {
      padding: 15px;
      font-weight: bold;
      color: #ff4d4d;
      cursor: pointer;
    }

    .sidebar {
      position: fixed;
      top: 0;
      right: -100%;
      width: 100%;
      max-width: 485px;
      height: 100%;
      background: #fff;
      box-shadow: -3px 0 8px rgba(0, 0, 0, 0.15);
      z-index: 999999;
      transition: right 0.3s ease-in-out;
      border-left: 1px solid #ccc;
    }

    .sidebar.open {
      right: 0;
    }

    .sidebar-header {
      display: flex;
      align-items: center;
      padding: 16px;
      border-bottom: 1px solid #e0e0e0;
      font-size: 18px;
      font-weight: bold;
    }

    .sidebar-header i {
      margin-right: 10px;
      font-size: 20px;
      cursor: pointer;
    }

    .add-new-address {
      text-align: center;
      color: red;
      font-weight: 600;
      padding: 12px;
      border-bottom: 1px solid #f0f0f0;
    }
    .add-new-address:hover{
      text-align: center;
      color: red;
      font-weight: 600;
      padding: 12px;
      border-bottom: 1px solid #f0f0f0;
      cursor:pointer;
    }

    .address-section {
      padding: 16px;
      padding-bottom:45px;
    }

    .section-title {
      font-size: 14px;
      color: #666;
      margin-bottom: 12px;
    }

    .address-card {
      display: flex;
      align-items: flex-start;
      background: #fff;
      border: 1px solid #eee;
      border-radius: 6px;
      padding: 12px;
      margin-bottom: 12px;
      position: relative;
    }

    .address-card.active {
      background: #f3fff3;
      border-color: #c1eac5;
    }

    .icon {
      margin-right: 10px;
      font-size: 20px;
      margin-top: 3px;
    }

    .address-content {
      flex: 1;
      font-size: 14px;
      line-height: 1.4;
      color: #333;
    }

    .address-content b {
      display: block;
      margin-bottom: 4px;
    }

    .tick-icon {
      font-size: 16px;
      color: green;
      margin-left: 8px;
      margin-top: 2px;
    }

    .menu-icon {
      position: absolute;
      right: 12px;
      top: 16px;
      font-size: 18px;
      color: #999;
      cursor: pointer;
    }

    /* Responsive */
    @media screen and (max-width: 480px) {
      .sidebar {
        max-width: 100%;
      }
    }
  </style>
<body>
<!-- Desktop side cart html start  -->
<div class="cart-sidebar position-fixed top-0 end-0 bg-white shadow" style="width: fit-content; height: 100vh;  -index: 1050; overflow-y: auto;" id="cartSidebar">
<div class="d-flex justify-content-between align-items-center p-3" style="box-shadow: 0 2px 2px rgb(0 0 0 / 25%);position: sticky;top: 0;background-color: white;z-index: 999;">
    <h5 class="fw-bold"> <i class="fa-solid fa-arrow-left me-3" onclick="document.getElementById('cartSidebar').classList.remove('show')"></i>My Cart</h5>
    <div class="">      
      <button class="btn btn-success btn-sm"><i class="fa fa-wallet"></i> <span class="rupee-symbol-sidecart ms-2">₹</span> 30</button>
    </div>
  </div>

  <div class=" p-3 rounded my-3 p-3">
    <div class="d-flex justify-content-between align-items-center">
      <div class="gotostore">
        <h6 class="mb-0 fw-semibold">Aryan Grocery</h6>
        <a href=""><small class="text-success">Go to store</small></a>
      </div>
      <div class="">
      <button class="btn btn-sm delivery-toggle-btn " id="deliveryToggle">
        <i class="fa fa-clock me-1"></i> Delivery in 30 min 
      </button>
      </div>
    </div>

    <div id="deliveryOptions" class="" style="display: none;">
      <div class="row mb-2">
        <div class="col">
          <select class="form-select form-select-sm">
            <option>Tomorrow, 11/24</option>
            <option>Today, 11/23</option>
          </select>
        </div>
        <div class="col">
          <select class="form-select form-select-sm">
            <option>10:00 AM - 1:00 PM</option>
            <option>1:00 PM - 4:00 PM</option>
          </select>
        </div>
      </div>
      <div class="text-center">
        <span class="text-muted d-block mb-2">or</span>
        <button class="btn btn-success w-100" id="expressBtn">
          <i class="fa fa-bolt me-1"></i> Express Delivery in 20 mins
        </button>
      </div>
    </div>
  </div>

  <!-- Cart Items -->
  <div>
      <div class="d-flex justify-content-between align-items-center px-3">
        <div>
          <small class="text-muted">Shipment of 2 items</small>
        </div>
        <div>
        <i class="fa-solid fa-xmark m-1"></i><small class="mb-1">clear all </small>
        </div>
      </div>
    <div class="cart-item d-flex align-items-center justify-content-between border-bottom py-2 p-3">  
      <div class="d-flex align-items-center totalimg">
        <img src="{{ asset('public/assets/website/images/category1.png')}}"  alt="..." >
        <div class="mx-3">
          <p class="mb-0">Jackpot Cheese Balls</p>
          <small class="text-success">₹55 <s class="text-muted">₹60</s></small>
        </div>
      </div>
      <div class="input-group input-group-sm sidecartbutton" style="width: 90px;">
          <button class="btn btn-danger decrement-btn">-</button>
          <input type="text" class="form-control text-center quantity-input" value="1">
          <button class="btn btn-danger increment-btn">+</button>
      </div>
    </div>
  </div>

  <div class="cart-item d-flex align-items-center justify-content-between border-bottom py-2 p-3">
    <div class="d-flex align-items-center totalimg">
      <img src="{{ asset('public/assets/website/images/category3.png')}}"  alt="...">
      <div class="mx-3">
        <p class="mb-0">Coca Cola - 250 ml</p>
        <small class="text-success">₹55 <s class="text-muted">₹60</s></small>
      </div>
    </div>
    <div class="input-group input-group-sm sidecartbutton" style="width: 90px;">
        <button class="btn btn-danger decrement-btn">-</button>
        <input type="text" class="form-control text-center quantity-input" value="1">
        <button class="btn btn-danger increment-btn">+</button>
    </div>
  </div>

  <!-- Free delivery notice -->
  <div class="my-3 free-delivery-alert p-3">
    <div class="freedelivery">
      <div>
        <small class="text-dark fw-semibold">Add item worth ₹60 to get free delivery</small>
      </div>
      <div>
      <img src="{{ asset('public/assets/website/images/arrow.png')}}" alt="">
      </div>
    </div>  

    <div class="progress mt-2" style="height: 10px;">
      <div class="progress-bar" style="width: 60%"></div>
    </div>
  </div>

  <div class="accordion mb-3 px-2" id="coupons">
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingOne">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
          View Coupons & Offers
        </button>
      </h2>
      <div id="collapseOne" class="accordion-collapse collapse">
        <div class="accordion-body">
          No coupons available.
        </div>
      </div>
    </div>
  </div>

  <div class="d-flex justify-content-between align-items-center bg-light p-2 rounded mb-3 wallet-box p-3">
    <div>
      <span id="walletText"><i class="fa fa-wallet me-1"></i> Kwiklly Points</span>
    </div>
    <button class="btn btn-outline-success btn-sm" id="walletBtn">Use ₹5</button>
  </div>

  <!-- Toggle Button -->
  <div class="d-flex align-items-center p-3">
    <h6 class="fw-bold mb-0">Bill Summary</h6>
    <button class="toggle-bill-btn" id="toggleBillBtn"><i class="fa fa-chevron-down"></i></button>
  </div>

  <!-- Bill Summary -->
  <div class=" pt-2 mt-2 p-3" id="billSummary" style="display: none;">
    <ul class="list-unstyled small">
      <li class="d-flex justify-content-between">
        <span>Item charge</span><span>₹380 <s class="text-muted">₹332</s></span>
      </li>
      <li class="d-flex justify-content-between">
        <span>Delivery Charges</span><span>₹20</span>
      </li>
      <li class="d-flex justify-content-between">
        <span>Coupon Discount</span><span class="text-success">- ₹40</span>
      </li>
      <li class="d-flex justify-content-between">
        <span>Wallet Discount</span><span class="text-success">- ₹5</span>
      </li>
    </ul>
    </div>
    <div class="grand-total-box p-3">
            <h6>Total charge</h6>
                <div class="total-row">
                    <div class="price-wrapper">
                    <div class="prices">
                        <del>₹400</del>
                        <strong>₹347</strong>
                    </div>
                    <div class="saved-tag">Saved ₹53</div>
                    </div>
                </div>
            </div>
            <!-- Grand Total Section -->
            <div class="grand-total-box p-3">
            <h3>Grand Total</h3>
                <div class="total-row">
                    <div class="price-wrapper">
                    <div class="prices">
                        <del>₹400</del>
                        <strong>₹347</strong>
                    </div>
                    <div class="saved-tag">Saved ₹53</div>
                    </div>
                </div>
            </div>

        <!-- Bottom Fixed Section -->
        <div class="bottom-bar">
            <div class="delivery-section">
            <div class="delivery-left">
                <i class="fas fa-home"></i>
                <div class="delivery-text">
                <div class="label">Delivering to</div>
                <div>Comfort Pg, Radhe Krishna Mandir, Saket, 201015</div>
                </div>
            </div>
            <div class="change-link"  onclick="openSidebar()">Change</div>
            </div>
            <div class="proceed-btn">Proceed to Pay ₹347</div>
        </div>
  </div>    
</div>
<!--Desktop side cart html end  -->

<!-- address change side bar start  -->
 <!-- Sidebar -->
<div class="sidebar" id="addressSidebar">
  <!-- Header -->
  <div class="sidebar-header">
    <i class="fa-solid fa-arrow-left" onclick="closeSidebar()"></i>Select Address
  </div>

  <!-- Add new address -->
  <div class="add-new-address" onclick="openPataSidebar()">Add new address</div>

  <!-- Address list -->
  <div class="address-section pataoverflow">
    <div class="section-title">Your Saved Address</div>

    <!-- Active Address -->
     <div class="address-card selected">
        <div class="address-left">
          <img src="https://cdn-icons-png.flaticon.com/128/69/69524.png" alt="Home" class="icon">
          <div>
            <strong>Home</strong>
            <p>ARYAN KUMAR, x 221, Okhla Phase 3 Road Okhla Phase III, Okhla Industrial Estate, New Delhi, Delhi, India</p>
          </div>
        </div>
        <div class="address-right">
          <span class="check">&#x2714;</span>
          <div class="dropdown-wrapper">
            <span class="options" onclick="toggleDropdown(this)">&#8942;</span>
            <div class="dropdown-menu">
              <div onclick="editAddress()">Edit</div>
              <div onclick="deleteAddress(this)">Delete</div>
            </div>
          </div>
        </div>
      </div>

      <!-- Address Card 2 -->
      <div class="address-card">
        <div class="address-left">
          <img src="https://cdn-icons-png.flaticon.com/128/609/609803.png" alt="Work" class="icon">
          <div>
            <strong>Work</strong>
            <p>Rakesh, x 221, Okhla Phase 3 Road Okhla Phase III, Okhla Industrial Estate, New Delhi, Delhi, India</p>
          </div>
        </div>
        <div class="address-right">
          <span class="check">&#x2714;</span>
          <div class="dropdown-wrapper">
            <span class="options" onclick="toggleDropdown(this)">&#8942;</span>
            <div class="dropdown-menu">
              <div onclick="editAddress()">Edit</div>
              <div onclick="deleteAddress(this)">Delete</div>
            </div>
          </div>
        </div>
      </div>
      <div class="address-card selected">
        <div class="address-left">
          <img src="https://cdn-icons-png.flaticon.com/128/69/69524.png" alt="Home" class="icon">
          <div>
            <strong>Home</strong>
            <p>ARYAN KUMAR, x 221, Okhla Phase 3 Road Okhla Phase III, Okhla Industrial Estate, New Delhi, Delhi, India</p>
          </div>
        </div>
        <div class="address-right">
          <span class="check">&#x2714;</span>
          <div class="dropdown-wrapper">
            <span class="options" onclick="toggleDropdown(this)">&#8942;</span>
            <div class="dropdown-menu">
              <div onclick="editAddress()">Edit</div>
              <div onclick="deleteAddress(this)">Delete</div>
            </div>
          </div>
        </div>
      </div>

      <!-- Address Card 2 -->
      <div class="address-card">
        <div class="address-left">
          <img src="https://cdn-icons-png.flaticon.com/128/609/609803.png" alt="Work" class="icon">
          <div>
            <strong>Work</strong>
            <p>Rakesh, x 221, Okhla Phase 3 Road Okhla Phase III, Okhla Industrial Estate, New Delhi, Delhi, India</p>
          </div>
        </div>
        <div class="address-right">
          <span class="check">&#x2714;</span>
          <div class="dropdown-wrapper">
            <span class="options" onclick="toggleDropdown(this)">&#8942;</span>
            <div class="dropdown-menu">
              <div onclick="editAddress()">Edit</div>
              <div onclick="deleteAddress(this)">Delete</div>
            </div>
          </div>
        </div>
      </div>
      <div class="address-card selected">
        <div class="address-left">
          <img src="https://cdn-icons-png.flaticon.com/128/69/69524.png" alt="Home" class="icon">
          <div>
            <strong>Home</strong>
            <p>ARYAN KUMAR, x 221, Okhla Phase 3 Road Okhla Phase III, Okhla Industrial Estate, New Delhi, Delhi, India</p>
          </div>
        </div>
        <div class="address-right">
          <span class="check">&#x2714;</span>
          <div class="dropdown-wrapper">
            <span class="options" onclick="toggleDropdown(this)">&#8942;</span>
            <div class="dropdown-menu">
              <div onclick="editAddress()">Edit</div>
              <div onclick="deleteAddress(this)">Delete</div>
            </div>
          </div>
        </div>
      </div>

      <!-- Address Card 2 -->
      <div class="address-card">
        <div class="address-left">
          <img src="https://cdn-icons-png.flaticon.com/128/609/609803.png" alt="Work" class="icon">
          <div>
            <strong>Work</strong>
            <p>Rakesh, x 221, Okhla Phase 3 Road Okhla Phase III, Okhla Industrial Estate, New Delhi, Delhi, India</p>
          </div>
        </div>
        <div class="address-right">
          <span class="check">&#x2714;</span>
          <div class="dropdown-wrapper">
            <span class="options" onclick="toggleDropdown(this)">&#8942;</span>
            <div class="dropdown-menu">
              <div onclick="editAddress()">Edit</div>
              <div onclick="deleteAddress(this)">Delete</div>
            </div>
          </div>
        </div>
      </div>
      <div class="address-card selected">
        <div class="address-left">
          <img src="https://cdn-icons-png.flaticon.com/128/69/69524.png" alt="Home" class="icon">
          <div>
            <strong>Home</strong>
            <p>ARYAN KUMAR, x 221, Okhla Phase 3 Road Okhla Phase III, Okhla Industrial Estate, New Delhi, Delhi, India</p>
          </div>
        </div>
        <div class="address-right">
          <span class="check">&#x2714;</span>
          <div class="dropdown-wrapper">
            <span class="options" onclick="toggleDropdown(this)">&#8942;</span>
            <div class="dropdown-menu">
              <div onclick="editAddress()">Edit</div>
              <div onclick="deleteAddress(this)">Delete</div>
            </div>
          </div>
        </div>
      </div>

      <!-- Address Card 2 -->
      <div class="address-card">
        <div class="address-left">
          <img src="https://cdn-icons-png.flaticon.com/128/609/609803.png" alt="Work" class="icon">
          <div>
            <strong>Work</strong>
            <p>Rakesh, x 221, Okhla Phase 3 Road Okhla Phase III, Okhla Industrial Estate, New Delhi, Delhi, India</p>
          </div>
        </div>
        <div class="address-right">
          <span class="check">&#x2714;</span>
          <div class="dropdown-wrapper">
            <span class="options" onclick="toggleDropdown(this)">&#8942;</span>
            <div class="dropdown-menu">
              <div onclick="editAddress()">Edit</div>
              <div onclick="deleteAddress(this)">Delete</div>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>
 <!-- address change side bar end  -->
<!-- Sidebar -->
<div class="pata-sidebar-overlay" id="pataSidebar">
  <div class="pata-sidebar">
    <!-- Header -->
    <div class="pata-sidebar-header">
      <span class="pata-back-btn" onclick="closePataSidebar()"><i class="fa-solid fa-arrow-left"></i></span>
      <h5 class="mb-0">New Address</h5>
    </div>

    <!-- Body -->
    <div class="p-3 pataoverflow">
      <!-- Location input -->
      <input type="text" class="form-control mb-2" placeholder="Your Location">

      <!--  Map -->
      <div class="pata-map">
        <img src="https://maps.wikimedia.org/img/osm-intl,11,40.730610,-73.935242,550x300.png" alt="Map" class="img-fluid">
      </div>

      <!-- Location address text -->
      <div class="pata-location-title">Your Location</div>
      <div class="pata-location-desc">
        Cisf ground, gali no 2, near metro station gate no 3, saket, Delhi
      </div>

      <!-- Buttons: Home / Work -->
      <div class="d-flex justify-content-between pata-tag-buttons">
        <button id="pataHomeBtn" class="pata-home">🏠 Home</button>
        <button id="pataWorkBtn" class="pata-work">🏢 Work</button>
      </div>

      <!-- Form Inputs -->
      <div class="pata-input"><input type="text" placeholder="Area / Sector / Locality*" class="form-control"></div>
      <div class="pata-input"><input type="text" placeholder="Flat / Building no*" class="form-control"></div>
      <div class="pata-input"><input type="text" placeholder="Landmark (optional)" class="form-control"></div>
      <div class="pata-input"><input type="text" placeholder="Pincode*" class="form-control"></div>
      <div class="pata-input"><input type="text" placeholder="Name*" class="form-control"></div>
      <div class="pata-input"><input type="text" placeholder="Phone Number*" class="form-control"></div>
      <div class="pata-input"><input type="text" placeholder="Alternate Phone Number (optional)" class="form-control"></div>

      <!-- Save Button -->
      <button class="pata-save-btn">Save Address</button>
    </div>
  </div>
</div>


<!-- mobile side cart html start  -->
<div class="cart-sidebar position-fixed top-0 end-0 bg-white shadow" style="width: fit-content; height: 100vh;  -index: 1050; overflow-y: auto;" id="cartSidebar2">
<div class="d-flex justify-content-between align-items-center p-3" style="box-shadow: 0 2px 2px rgb(0 0 0 / 25%);position: sticky;top: 0;background-color: white;z-index: 999;">
    <h5 class="fw-bold">My Cart</h5>
    <div class="">      
      <button class="btn btn-success btn-sm"><i class="fa fa-wallet"></i> <span class="rupee-symbol-sidecart ms-2">₹</span> 30</button>
      <button class="btn-close mx-2" onclick="document.getElementById('cartSidebar2').classList.remove('show')"></button>
    </div>
  </div>

  <div class="grocery-header p-3 rounded my-3 p-3">
    <div class="d-flex justify-content-between align-items-center">
      <div class="gotostore">
        <h6 class="mb-0 fw-semibold">Aryan Grocery</h6>
        <a href=""><small class="text-success">Go to store</small></a>
      </div>
      <button class="btn btn-sm delivery-toggle-btn border" id="deliveryToggle2">
        <i class="fa fa-clock me-1"></i> Delivery in 30 min
      </button>
    </div>

    <div id="deliveryOptions2" class="mt-3" style="display: none;">
      <div class="row mb-2">
        <div class="col">
          <select class="form-select form-select-sm">
            <option>Tomorrow, 11/24</option>
            <option>Today, 11/23</option>
          </select>
        </div>
        <div class="col">
          <select class="form-select form-select-sm">
            <option>10:00 AM - 1:00 PM</option>
            <option>1:00 PM - 4:00 PM</option>
          </select>
        </div>
      </div>
      <div class="text-center">
        <span class="text-muted d-block mb-2">or</span>
        <button class="btn btn-success w-100" id="expressBtn2">
          <i class="fa fa-bolt me-1"></i> Express Delivery in 20 mins
        </button>
      </div>
    </div>
  </div>

  <!-- Cart Items -->
  <div>
    <div class="d-flex justify-content-between align-items-center px-3">
      <div>
        <small class="text-muted">Shipment of 2 items</small>
      </div>
      <div>
      <i class="fa-solid fa-xmark m-1"></i><small class="mb-1">clear all </small>
      </div>
    </div>
    <div class="cart-item d-flex align-items-center justify-content-between border-bottom py-2 p-3">
      <div class="d-flex align-items-center totalimg">
        <img src="{{ asset('public/assets/website/images/category1.png')}}"  alt="..." >
        <div class="mx-3">
          <p class="mb-0">Jackpot Cheese Balls</p>
          <small class="text-success">₹55 <s class="text-muted">₹60</s></small>
        </div>
      </div>
      <div class="input-group input-group-sm sidecartbutton" style="width: 90px;">
          <button class="btn btn-danger decrement-btn">-</button>
          <input type="text" class="form-control text-center quantity-input" value="1">
          <button class="btn btn-danger increment-btn">+</button>
      </div>
    </div>
  </div>

  <div class="cart-item d-flex align-items-center justify-content-between border-bottom py-2 p-3">
    <div class="d-flex align-items-center totalimg">
      <img src="{{ asset('public/assets/website/images/category3.png')}}"  alt="...">
      <div class="mx-3">
        <p class="mb-0">Coca Cola - 250 ml</p>
        <small class="text-success">₹55 <s class="text-muted">₹60</s></small>
      </div>
    </div>
    <div class="input-group input-group-sm sidecartbutton" style="width: 90px;">
        <button class="btn btn-danger decrement-btn">-</button>
        <input type="text" class="form-control text-center quantity-input" value="1">
        <button class="btn btn-danger increment-btn">+</button>
    </div>
  </div>

  <!-- Free delivery notice -->
  <div class="my-3 free-delivery-alert p-3">
    <small class="text-dark fw-semibold">Add item worth ₹60 to get free delivery</small>
    <div class="progress mt-2" style="height: 10px;">
      <div class="progress-bar bg-warning" style="width: 60%"></div>
    </div>
  </div>

  <div class="accordion mb-3 px-2" id="coupons">
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingOne">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
          View Coupons & Offers
        </button>
      </h2>
      <div id="collapseOne" class="accordion-collapse collapse">
        <div class="accordion-body">
          No coupons available.
        </div>
      </div>
    </div>
  </div>

  <div class="d-flex justify-content-between align-items-center bg-light p-2 rounded mb-3 wallet-box p-3">
    <div>
      <span id="walletText2"><i class="fa fa-wallet me-1"></i> Kwiklly Points </span>
    </div>
    <button class="btn btn-outline-success btn-sm" id="walletBtn2">Use ₹5</button>
  </div>

  <!-- Toggle Button -->
  <div class="d-flex align-items-center p-3">
    <h6 class="fw-bold mb-0">Bill Summary</h6>
    <button class="toggle-bill-btn" id="toggleBillBtn2"><i class="fa fa-chevron-down"></i></button>
  </div>

  <!-- Bill Summary -->
  <div class="border-top pt-2 mt-2 p-3" id="billSummary2" style="display: none;">
    <ul class="list-unstyled small">
      <li class="d-flex justify-content-between">
        <span>Item charge</span><span>₹380 <s class="text-muted">₹332</s></span>
      </li>
      <li class="d-flex justify-content-between">
        <span>Delivery Charges</span><span>₹20</span>
      </li>
      <li class="d-flex justify-content-between">
        <span>Coupon Discount</span><span class="text-success">- ₹40</span>
      </li>
      <li class="d-flex justify-content-between">
        <span>Wallet Discount</span><span class="text-success">- ₹5</span>
      </li>
    </ul>
    </div>
    <hr>
    <div class="grand-total-box p-3">
            <h6>Total charge</h6>
                <div class="total-row">
                    <div class="price-wrapper">
                    <div class="prices">
                        <del>₹400</del>
                        <strong>₹347</strong>
                    </div>
                    <div class="saved-tag">Saved ₹53</div>
                    </div>
                </div>
            </div>
            <!-- Grand Total Section -->
            <div class="grand-total-box p-3">
            <h3>Grand Total</h3>
                <div class="total-row">
                    <div class="price-wrapper">
                    <div class="prices">
                        <del>₹400</del>
                        <strong>₹347</strong>
                    </div>
                    <div class="saved-tag">Saved ₹53</div>
                    </div>
                </div>
            </div>

        <!-- Bottom Fixed Section -->
        <div class="bottom-bar">
            <div class="delivery-section">
            <div class="delivery-left">
                <i class="fas fa-home"></i>
                <div class="delivery-text">
                <div class="label">Delivering to</div>
                <div>Comfort Pg, Radhe Krishna Mandir, Saket, 201015</div>
                </div>
            </div>
            <div class="change-link"  onclick="openSidebar()">Change</div>
            </div>
            <div class="proceed-btn">Proceed to Pay ₹347</div>
        </div>
  </div>    
</div>
<!-- mobile side cart html end  -->



<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container-fluid">
        
        <!-- Desktop: Logo + Location & Search -->
        <div class="d-flex align-items-center w-100 d-none d-md-flex">
            <a class="navbar-brand" href="{{url('/')}}">
                <img src="{{ asset('public/assets/website/images/logo.png')}}" alt="Logo">
            </a>
            <div class="location-box mx-5"  onclick="toggleAddpop(event)">
                <i class="fas fa-map-marker-alt"></i>
                <span class="location-text">Current Location <br>Radhe Krishna Mandir, Sa...</span>
                <i class="fas fa-chevron-down dropdown-icon"></i>
            </div>
            <div class="search-container ms-3">
                <input type="text" class="form-control search-box" placeholder='Search "Banana"' />
                <button class="search-btn">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>

        <!-- Desktop Menu (Hidden in Mobile) -->
        <div class="d-flex align-items-center desktop-menu">
            <a href="{{ route('department')}}">Department</a>
            <a href="{{ route('stores')}}">Store</a>
            <a href="{{ route('login')}}">Join&nbsp;Us</a>
            <button class="cart-btn d-none d-md-flex" id="openCart">
                <i class="fa fa-shopping-cart"></i> Cart (4)
            </button>
        </div>

        <!-- Mobile: Location and Cart in one row -->
        <div class="mobile-top d-md-none">
            <div class="location-boxs"  onclick="toggleAddpop(event)">
                <i class="fas fa-map-marker-alt"></i>
                <span class="locations-text">Current Location <br>Rache Krishna Mandir, Sa...</span>
                <i class="fas fa-chevron-down dropdown-icon"></i>
            </div>
            <button class="cart-btn" id="openCart2">
                <i class="fas fa-shopping-cart"></i>(4)
            </button>
        </div>

        <!-- Mobile Search (Separate Row) -->
        <div class="search-container d-md-none">
            <input type="text" class="form-control search-box" placeholder='Search "Banana"' />
            <button class="search-btn">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </div>
</nav>
  <!-- Overlay for desktop -->
  <div class="addpop-overlay" id="addpopOverlay" onclick="closeAddpop()"></div>

  <!-- Location Popup -->
  <div class="addpop-popup" id="addpopPopup">
    <button class="addpop-close-btn" onclick="closeAddpop()">×</button>
    <p class="addpop-title">Select Delivery Location</p>
    <div class="addpop-actions">
      <button class="addpop-detect-btn">Detect Current Location</button>
      <span class="addpop-or-text">or</span>
      <input type="text" class="addpop-search-input" placeholder="Search Location" />
    </div>
  </div>


<!-- Bottom Navigation (Only for Mobile) -->
<div class="bottom-nav d-flex justify-content-around d-md-none">
    <a href="{{url('/')}}" class="nav-item nav-link">
        <img src="{{ asset('public/assets/website/images/footlogo.png')}}" alt="" style="height:25px; margin-bottom:6px;">&nbsp;Kwiklly&nbsp;
    </a>
    <a href="department.php" class="nav-item nav-link">
    <img src="{{ asset('public/assets/website/images/departmenticon.png')}}" alt="" style="height:25px; margin-bottom:6px;">Department
    </a>
    <a href="store.php" class="nav-item nav-link">
    <img src="{{ asset('public/assets/website/images/storeicon.png')}}" alt="" style="height:25px; margin-bottom:6px;"> &nbsp;&nbsp;Store&nbsp;&nbsp;
    </a>
    <a href="login.php" class="nav-item nav-link">
    <img src="{{ asset('public/assets/website/images/joinicon.png')}}" alt="" style="height:25px; margin-bottom:6px;"> Join&nbsp;Us
    </a>
</div>
<script>
 document.addEventListener("DOMContentLoaded", function () {
    const homeBtn = document.getElementById("pataHomeBtn");
    const workBtn = document.getElementById("pataWorkBtn");

    homeBtn.addEventListener("click", function () {
      homeBtn.classList.add("active");
      workBtn.classList.remove("active");
    });

    workBtn.addEventListener("click", function () {
      workBtn.classList.add("active");
      homeBtn.classList.remove("active");
    });
  });

</script>
<script>
  function openCart() {
  document.getElementById("sideCart").classList.add("active");
  document.getElementById("overlay").classList.add("active");
}

function closeCart() {
  document.getElementById("sideCart").classList.remove("active");
  document.getElementById("overlay").classList.remove("active");
}
</script>
<script>
  const popup = document.getElementById("addpopPopup");
  const overlay = document.getElementById("addpopOverlay");
  const trigger = document.querySelector(".location-boxs");

  function toggleAddpop(e) {
    e.stopPropagation();
    const isMobile = window.innerWidth <= 768;

    if (isMobile) {
      popup.classList.add("addpop-mobile-active");
    } else {
      const rect = trigger.getBoundingClientRect();
      popup.style.left = rect.left + "px";
      popup.style.top = rect.bottom + window.scrollY + "px";
      popup.classList.add("addpop-desktop-active");
      overlay.classList.add("addpop-visible");
    }

    // Lock scroll on open (applies to both views)
    document.body.style.overflow = 'hidden';
  }

  function closeAddpop() {
    popup.classList.remove("addpop-mobile-active", "addpop-desktop-active");
    overlay.classList.remove("addpop-visible");

    // Unlock scroll
    document.body.style.overflow = 'auto';
  }

  window.addEventListener("click", () => {
    closeAddpop();
  });

  popup.addEventListener("click", (e) => e.stopPropagation());
</script>
<script>
  function openSidebar() {
    document.getElementById("addressSidebar").classList.add("open");
  }

  function closeSidebar() {
    document.getElementById("addressSidebar").classList.remove("open");
  }
</script>
