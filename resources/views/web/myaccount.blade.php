@extends('web.include.main')
@section('content')
<?php //include("include/header2.php")?>
<!-- first section start  -->
<section class="extrapadding">
<div class="container py-4 bg-light">
  <div class="row g-3">
    <!-- Profile and Wallet -->
    <div class="col-md-8 position-relative">
      <div class="profile-card">
        <a href="#" class="profile-edit-btn" onclick="openPopup()">✎ Edit</a>
        <div class="d-flex align-items-center profilephoto">
          <img src="{{ asset('public/assets/website/images/profile.jpg')}}" class="rounded-circle me-3" alt="User">
          <div class="profile-user-info">
            <h6 class="mb-1">Aryan Kumar</h6>
            <small>aryankumar79101117@gmail.com</small>
            <small>+91 8299314643</small>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-4 position-relative">
      <div class="profile-card">
        <div class="d-flex align-items-center">
          <div class="profile-user-info">
            <h6 class="mb-3">Kwiklly Wallet Balance</h6>
            <span class="pricepopupaccount">
                <span class="rupee-symbolaccount">₹</span> 145.00
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row mt-4">
    <!-- Sidebar -->
    <div class="col-md-3">
      <div class="profile-sidebar" id="profile-tab-group">
        <a href="#" class="profile-tab-btn active" data-target="orders">Orders</a>
        <a href="#" class="profile-tab-btn" data-target="address">Address</a>
        <a href="#" class="profile-tab-btn" data-target="couponsd">Coupons</a>
        <a href="#" class="profile-tab-btn" data-target="referrals">Referrals</a>
        <a href="#" class="profile-tab-btn" data-target="logout">Logout</a>
      </div>
    </div>

    <!-- Content -->
    <div class="col-md-9">
      <div class="profile-order-box">
        <!-- Orders -->
        <div class="profile-tab-content active" id="orders">
          <h5 class="mb-3">Orders</h5>

          <div class="profile-order-card">
            <img src="{{ asset('public/assets/website/images/storepimg1.png')}}" class="profile-order-img" alt="KFC">
            <div class="profile-order-details">
              <h6 class="mb-1">KFC</h6>
              <small>Delivered on: Sat 4 May 2024, 10:10 PM</small><br>
              <small>Order ID: #34JS8793J282FF4</small>
              <div class="profile-action-links mt-2">
                <a href="#">Show Details</a>
                <a href="#">Order Again</a>
              </div>
            </div>
            <div class="profile-total-badge">Total ₹55</div>
          </div>

          <div class="profile-order-card">
            <img src="{{ asset('public/assets/website/images/storepimg3.png')}}" class="profile-order-img" alt="KFC">
            <div class="profile-order-details">
              <h6 class="mb-1">KFC</h6>
              <small>Delivered on: Sat 4 May 2024, 10:10 PM</small><br>
              <small>Order ID: #34JS8793J282FF4</small>
              <div class="profile-action-links mt-2">
                <a href="#">Show Details</a>
                <a href="#">Order Again</a>
              </div>
            </div>
            <div class="profile-total-badge">Total ₹55</div>
          </div>

          <div class="profile-order-card">
            <img src="{{ asset('public/assets/website/images/storepimg2.png')}}" class="profile-order-img" alt="Dominos">
            <div class="profile-order-details">
              <h6 class="mb-1">Dominos</h6>
              <small>Delivered on: Sat 4 May 2024, 10:10 PM</small><br>
              <small>Order ID: #34JS8793J282FF4</small>
              <div class="profile-action-links mt-2">
                <a href="#">Show Details</a>
                <a href="#">Order Again</a>
              </div>
            </div>
            <div class="profile-total-badge">Total ₹342</div>
          </div>
        </div>

        <!-- Address -->
        <div class="profile-tab-content" id="address">
          <div class="address-wrapper">
            <h3><strong>Address</strong></h3>

            <div class="add-address-box">
              <strong>Add new address</strong>
            </div>

            <!-- Address Card 1 -->
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

        <!-- Coupons -->
        <div class="profile-tab-content" id="couponsd">
          <h4 class="fw-bold">Coupons</h4>

          <h6 class="fw-bold mt-4">Grocery</h6>
          <div class="row">
            <div class="col-md-6 mb-3">
              <div class="profile-coupon-card">
                <div class="d-flex justify-content-between align-items-start">
                  <div>
                    <h5 class="fw-bold mb-1">20% OFF</h5>
                    <p class="text-success mb-1">MAX ₹200</p>
                    <p class="fw-semibold mb-1">Holi Week Discount</p>
                    <p class="text-muted small mb-0">by Store Name <i class="bi bi-chevron-right"></i></p>
                  </div>
                  <div class="text-end">
                    <img src="{{ asset('public/assets/website/images/klogo.png')}}" alt="logo" class="profile-logo-img mb-2">
                    <p class="text-muted small">COUPON EXPIRES 23/05</p>
                  </div>
                </div>
                <div class="profile-coupon-footer text-end">
                  <span class="text-muted small">1/3</span>
                </div>
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <div class="profile-coupon-card">
                <div class="d-flex justify-content-between align-items-start">
                  <div>
                    <h5 class="fw-bold mb-1">20% OFF</h5>
                    <p class="text-success mb-1">MAX ₹200</p>
                    <p class="fw-semibold mb-1">Holi Week Discount</p>
                    <p class="text-muted small mb-0">by Store Name <i class="bi bi-chevron-right"></i></p>
                  </div>
                  <div class="text-end">
                    <img src="{{ asset('public/assets/website/images/klogo.png')}}" alt="logo" class="profile-logo-img mb-2">
                    <p class="text-muted small">COUPON EXPIRES 23/05</p>
                  </div>
                </div>
                <div class="profile-coupon-footer text-end">
                  <span class="text-muted small">1/3</span>
                </div>
              </div>
            </div>

            <!-- Copy & change discount, values for more cards -->
          </div>

          <h6 class="fw-bold mt-4">Restaurant</h6>
          <div class="row">
            <div class="col-md-6 mb-3">
              <div class="profile-coupon-card">
                <div class="d-flex justify-content-between align-items-start">
                  <div>
                    <h5 class="fw-bold mb-1">75% OFF</h5>
                    <p class="text-success mb-1">MAX ₹200</p>   
                    <p class="fw-semibold mb-1">Holi Week Discount</p>
                    <p class="text-muted small mb-0">by Store Name <i class="bi bi-chevron-right"></i></p>
                  </div>
                  <div class="text-end">
                    <img src="{{ asset('public/assets/website/images/klogo.png')}}" alt="logo" class="profile-logo-img mb-2">
                    <p class="text-muted small">COUPON EXPIRES 23/05</p>
                  </div>
                </div>
                <div class="profile-coupon-footer text-end">
                  <span class="text-muted small">1/3</span>
                </div>
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <div class="profile-coupon-card">
                <div class="d-flex justify-content-between align-items-start">
                  <div>
                    <h5 class="fw-bold mb-1">20% OFF</h5>
                    <p class="text-success mb-1">MAX ₹200</p>
                    <p class="fw-semibold mb-1">Holi Week Discount</p>
                    <p class="text-muted small mb-0">by Store Name <i class="bi bi-chevron-right"></i></p>
                  </div>
                  <div class="text-end">
                    <img src="{{ asset('public/assets/website/images/klogo.png')}}" alt="logo" class="profile-logo-img mb-2">
                    <p class="text-muted small">COUPON EXPIRES 23/05</p>
                  </div>
                </div>
                <div class="profile-coupon-footer text-end">
                  <span class="text-muted small">1/3</span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Referrals -->
        <div class="profile-tab-content" id="referrals">
          <h4 class="fw-bold">Refer a friend to earn extra cash</h4>
          <h6 class="fw-bold mt-3">How it works</h6>

          <div class="row text-center mt-4 profile-referral-steps">
            <div class="col-md-4 mb-4">
              <div class="position-relative d-inline-block">
                <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="step 1" class="rounded-circle profile-referral-img">
                <div class="profile-referral-step">1</div>
              </div>
              <p class="mt-3">Share the referral<br> link with your friend</p>
            </div>

            <div class="col-md-4 mb-4">
              <div class="position-relative d-inline-block">
                <img src="https://cdn-icons-png.flaticon.com/512/891/891419.png" alt="step 2" class="rounded-circle profile-referral-img">
                <div class="profile-referral-step">2</div>
              </div>
              <p class="mt-3">After your friend places<br> their first order, you get<br> 25% off up to ₹200 on your next order</p>
            </div>

            <div class="col-md-4 mb-4">
              <div class="position-relative d-inline-block">
                <img src="https://cdn-icons-png.flaticon.com/512/3135/3135706.png" alt="step 3" class="rounded-circle profile-referral-img">
                <div class="profile-referral-step">3</div>
              </div>
              <p class="mt-3">Upon 10 successful<br> referrals, you earn<br> ₹2000</p>
            </div>
          </div>

          <div class="d-flex flex-column align-items-center gap-3 mt-3">
            <button class="profile-referral-btn profile-whatsapp-btn">
            <i class="fa-brands fa-whatsapp"></i> Invite via whatsapp
            </button>
            <button class="profile-referral-btn profile-link-btn">
            <i class="fa-solid fa-up-right-from-square me-2"></i>Share Invite Link
            </button>
          </div>
        </div>

        <!-- Logout -->
        <div class="profile-tab-content" id="logout">
          <h5 class="mb-3 text-danger">Logout</h5>
          <p>You have been logged out successfully.</p> 
        </div>
      </div>
    </div>
  </div>
</div>
</section>

<!-- pop up for edit profile  start -->
<div class="mypopup-overlay" id="editPopup">
  <div class="mypopup-content">
    <div class="mypopup-header">
      <h2>Edit Profile</h2>
      <span class="mypopup-close" onclick="closePopup()">&times;</span>
    </div>

    <div class="mypopup-image">
      <img id="profilePreview" src="https://via.placeholder.com/130" alt="Profile Picture" />
      <input type="file" id="imageInput" accept="image/*" style="display: none;" onchange="previewImage(event)" />
      <div class="mypopup-image-links">
        <a href="javascript:void(0);" onclick="document.getElementById('imageInput').click()">Change image</a>
        <a href="javascript:void(0);" onclick="deleteImage()">Delete Image</a>
      </div>
    </div>

    <div class="mypopup-form">
      <input type="text" placeholder="Name*" value="Aryan Kumar" />
      <input type="email" placeholder="Email*" value="aryankumar79101117@gmail.com" />
      <input type="tel" placeholder="Phone Number*" value="8299314643" />
      <button>Save</button>
    </div>
  </div>
</div>
 <!-- pop up for edit profile end  -->


<!-- first section end  -->
<?php //include("include/footer.php")?>
<script>
  const tabs = document.querySelectorAll(".profile-tab-btn");
  const tabContents = document.querySelectorAll(".profile-tab-content");

  tabs.forEach(tab => {
    tab.addEventListener("click", function(e) {
      e.preventDefault();

      // Remove active class from all tabs and hide all content
      tabs.forEach(t => t.classList.remove("active"));
      tabContents.forEach(c => c.classList.remove("active"));

      // Add active class to clicked tab and show corresponding content
      this.classList.add("active");
      document.getElementById(this.dataset.target).classList.add("active");
    });
  });
</script>
<!-- SweetAlert2 -->

<script>
  function toggleDropdown(el) {
    const dropdown = el.nextElementSibling;
    document.querySelectorAll('.dropdown-menu').forEach(menu => {
      if (menu !== dropdown) menu.style.display = 'none';
    });
    dropdown.style.display = dropdown.style.display === 'flex' ? 'none' : 'flex';
  }

  function editAddress() {
    Swal.fire('Edit Clicked', 'You can add your edit logic here.', 'info');
  }

  function deleteAddress(el) {
    Swal.fire({
      title: 'Are you sure?',
      text: 'Do you want to delete this address?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#ff4d00',
      cancelButtonColor: '#aaa',
      confirmButtonText: 'Yes, delete it!',
      cancelButtonText: 'Cancel'
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire('Deleted!', 'Your address has been deleted.', 'success');
        el.closest('.address-card').remove();
      }
    });
  }

  // Close dropdown on outside click
  document.addEventListener('click', function(e) {
    if (!e.target.closest('.dropdown-wrapper')) {
      document.querySelectorAll('.dropdown-menu').forEach(menu => {
        menu.style.display = 'none';
      });
    }
  });
</script>
<script>
  function openPopup() {
    document.getElementById("editPopup").style.display = "flex";
  }

  function closePopup() {
    document.getElementById("editPopup").style.display = "none";
  }

  function previewImage(event) {
    const reader = new FileReader();
    reader.onload = function () {
      document.getElementById('profilePreview').src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  }

  function deleteImage() {
    document.getElementById('profilePreview').src = 'https://via.placeholder.com/130';
  }
</script>
@endsection