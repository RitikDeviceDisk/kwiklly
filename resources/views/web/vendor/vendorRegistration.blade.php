@extends('web.include.main')
@section('content')
<!-- first section start  -->
<section class="registrationspace">
    <div class="container register-section">
        <div class="row align-items-center">
            <div class="col-md-6 text-center position-relative my-4">
                <div class="image-container">
                    <div class="green-bg"></div>
                    <img src="{{ asset('public/assets/website/images/registerimg2.png')}}" class="main-image" alt="Seller">
                    <img src="{{ asset('public/assets/website/images/registerimg1.png')}}" class="fruit-image" alt="Fruits">
                    <!-- Info Boxes -->
                    <div class="info-box info-box-1">
                    <i class="fa-solid fa-cube"></i>
                        <span><strong>3000+</strong><br>We cover almost every product</span>
                    </div>
                    <div class="info-box info-box-2">
                    <i class="fa-solid fa-globe"></i>
                        <span><strong>1000+</strong><br>Fastest growing seller network</span>
                    </div>
                    <div class="info-box info-box-3">
                        <i class="fa fa-credit-card"></i>
                        <span><strong>Quick Payment</strong><br>Quick & trustworthy payments</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 my-4">
                <div class="form-section">
                    <h3 id="form-heading">Register Today</h3>
                    <form id="multiStepForm" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">


                    <input type="text" id="form-input" class="form-control mb-3" placeholder="Enter Landmark" hidden>
                    <!-- Dynamic Content (Map or Forms) -->
                    <div id="dynamic-container"></div>                    
                    <!-- Buttons -->
                    <div class="d-flex justify-content-between mt-3">
                        <button type="button" id="confirm-btn" class="confirm-btn btn btn-danger" onclick="nextStep()">Confirm and Proceed</button>
                    </div>
                    <div class=" mt-3 text-center">
                        <button type="button" id="back-btn" class="back-btn btn btn-outline-secondary" onclick="prevStep()" style="display: none;">
                            Go Back
                        </button>
                    </div>
                    </form>
                </div>
            </div>  
        </div>      
    </div>
</section>
<!-- first section end  -->
<!-- second section start  -->
<section class="followpadding">
<div class="steps-container">
        <h2><strong>Follow These 4 Simple Steps to Get Started.</strong></h2>
        <div class="row mt-4">
            <div class="col-md-6 mt-5">
                <div class="step-box">
                    <div class="step-number">01</div>
                    <div class="step-title py-3">Vendor Registration</div>
                    <p>Let us know what are you selling e.g. products or services like teach me</p>
                    <ul>
                        <li>List your products</li>
                        <li>Uploading the products information</li>
                        <li>List your services</li>
                        <li>24*7 help</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 mt-5">
                <div class="step-box">
                    <div class="step-number">02</div>
                    <div class="step-title py-3">Verification of Documents</div>
                    <p>Let us know what are you selling e.g. products or services like teach me</p>
                    <ul>
                        <li>List your products</li>
                        <li>Uploading the products information</li>
                        <li>List your services</li>
                        <li>24*7 help</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 mt-5">
                <div class="step-box">
                    <div class="step-number">03</div>
                    <div class="step-title py-3">Verification of Documents</div>
                    <p>Let us know what are you selling e.g. products or services like teach me</p>
                    <ul>
                        <li>List your products</li>
                        <li>Uploading the products information</li>
                        <li>List your services</li>
                        <li>24*7 help</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 mt-5">
                <div class="step-box">
                    <div class="step-number">04</div>
                    <div class="step-title py-3">Verification of Documents</div>
                    <p>Let us know what are you selling e.g. products or services like teach me</p>
                    <ul>
                        <li>List your products</li>
                        <li>Uploading the products information</li>
                        <li>List your services</li>
                        <li>24*7 help</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- second section end  -->
<!-- third section start  -->
<section>
    <div class="container">
        <div class="row">
          <div class="col-md-12 col-12">
            <div class="cta-section">
                <div class="cta-text">
                    <h2>Start Selling Now</h2>
                    <p>For any questions or concerns, feel free to contact us.</p>
                    <button class="cta-btn">Contact Us</button>
                </div>
                <div class="cta-image">
                    <img src="{{ asset('public/assets/website/images/ctaimage.png')}}" alt="Fruits Basket">
                </div>
            </div>
          </div>
        </div>
    </div>
</section>
<!-- third section end  -->
<!-- fourth  section start  -->
<section>
<div class="container mt-5">
    <!-- Heading and Subheading -->
    <h2 class="why">Why Choose Us</h2>

    <div class="row mt-4">
        <!-- Row 1 -->
        <div class="col-md-4 col-6 mt-4">
            <div class="feature-box1">
                <i class="fa fa-users"></i>
            </div>
            <div class="feature-heading">Wider Customer Reach</div>
            <p class="feature-description">Constantly connect with local customers looking for fast and reliable deliveries.</p>
        </div>

        <div class="col-md-4 col-6 mt-4">
            <div class="feature-box1">
            <i class="fa-solid fa-truck"></i>
            </div>
            <div class="feature-heading">Fast & Efficient Deliveries</div>
            <p class="feature-description">Our optimized logistics ensure speedy and hassle-free order fulfillment.</p>
        </div>

        <div class="col-md-4 col-6 mt-4">
            <div class="feature-box1">
            <i class="fa-solid fa-gears"></i>
            </div>
            <div class="feature-heading">Seamless Integration</div>
            <p class="feature-description">Easily integrate your business with our platform for smooth order management.</p>
        </div>
 

   
        
        <div class="col-md-4 col-6 mt-4">
            <div class="feature-box1">
            <i class="fa-solid fa-money-bills"></i>
            </div>
            <div class="feature-heading">Cost-Effective Solution</div>
            <p class="feature-description">Reduce operational costs with our affordable and scalable delivery network.</p>
        </div>

        <div class="col-md-4 col-6 mt-4">
            <div class="feature-box1">
            <i class="fa-solid fa-clock"></i>
            </div>
            <div class="feature-heading">Real-Time Tracking</div>
            <p class="feature-description">Keep track of deliveries in real-time for better transparency and customer trust.</p>
        </div>

        <div class="col-md-4 col-6 mt-4">
            <div class="feature-box1">
            <i class="fa-solid fa-handshake-angle"></i>
            </div>
            <div class="feature-heading">24/7 Support</div>
            <p class="feature-description">Get dedicated assistance whenever you need it for a smooth business experienc</p>
        </div>
</div>
</div>
</section>
<!-- third section end  -->
<script>
    let step = 0;
    let formDataObj = {};
    let errorMessages = {}; // Store error messages

    function updateForm() {
        let container = document.getElementById("dynamic-container");
        let confirmBtn = document.getElementById("confirm-btn");
        let backBtn = document.getElementById("back-btn");
        let heading = document.getElementById("form-heading");

        backBtn.style.display = step > 0 ? "inline-block" : "none";

        if (step === 0) {
            heading.textContent = "Register Today";
            container.innerHTML = `
                <div class="form-group">
                    <input type="text" name="landmark" class="form-control mb-1" placeholder="Enter Landmark">
                    <div class="error text-danger mb-2" data-error-for="landmark"></div>
                </div>
                <div id="map" class="map-container mb-3">
                    <button type="button" class="use-location-btn" onclick="getLocation()">
                        <i class="fas fa-map-marker-alt"></i> Use Current Location
                    </button>
                </div>`;
            confirmBtn.textContent = "Confirm and Proceed";

            setTimeout(() => {
                initMap();
            }, 100);
        } else if (step === 1) {
            heading.textContent = "Register Today";
            container.innerHTML = `
                <h4>Your Location</h4>
                <p>Cisf ground, gali no 2, near metro station gate no 3,<br>Saket, Delhi</p>
                <h4>Personal Details</h4>

                <div class="form-group">
                    <input type="email" name="email" class="form-control mb-1" placeholder="Email Id">
                    <div class="error text-danger mb-2" data-error-for="email"></div>
                </div>

                <div class="form-group">
                    <input type="text" name="phone" class="form-control mb-1" placeholder="Phone Number">
                    <div class="error text-danger mb-2" data-error-for="phone"></div>
                </div>

                <div class="form-group">
                    <input type="password" name="password" class="form-control mb-1" placeholder="Password">
                    <div class="error text-danger mb-2" data-error-for="password"></div>
                </div>

                <div class="form-group">
                    <input type="password" name="password_confirmation" class="form-control mb-1" placeholder="Confirm Password">
                    <div class="error text-danger mb-2" data-error-for="password_confirmation"></div>
                </div>
            `;
        } else if (step === 2) {
            heading.textContent = "Register Today";
            container.innerHTML = `
                <h4>Company Details</h4>

                <div class="form-group">
                    <input type="text" name="company_name" class="form-control mb-1" placeholder="Company Name">
                    <div class="error text-danger mb-2" data-error-for="company_name"></div>
                </div>

                <div class="form-group">
                    <input type="text" name="gst_number" class="form-control mb-1" placeholder="GST Number">
                    <div class="error text-danger mb-2" data-error-for="gst_number"></div>
                </div>

                <div class="form-group">
                    <input type="text" name="company_address" class="form-control mb-1" placeholder="Address">
                    <div class="error text-danger mb-2" data-error-for="company_address"></div>
                </div>
            `;
        } else if (step === 3) {
            heading.textContent = "Register Today";
            confirmBtn.textContent = "Submit";
            container.innerHTML = `
                <h4>Bank Details</h4>

                <div class="form-group">
                    <input type="text" name="account_holder" class="form-control mb-1" placeholder="Account Holder Name">
                    <div class="error text-danger mb-2" data-error-for="account_holder"></div>
                </div>

                <div class="form-group">
                    <input type="text" name="account_number" class="form-control mb-1" placeholder="Account Number">
                    <div class="error text-danger mb-2" data-error-for="account_number"></div>
                </div>

                <div class="form-group">
                    <input type="text" name="ifsc_code" class="form-control mb-1" placeholder="IFSC Code">
                    <div class="error text-danger mb-2" data-error-for="ifsc_code"></div>
                </div>

                <label class="pb-2">Cancelled Cheque</label>
                <input type="file" name="cancelled_cheque" class="form-control mb-1">
                <div class="error text-danger mb-2" data-error-for="cancelled_cheque"></div>
            `;
        } else if (step === 4) {
            Swal.fire({
                text: "Thank you for your confirmation",
                icon: "success",
                confirmButtonText: "Continue"
            }).then(() => {
                step = 0;
                formDataObj = {};
                updateForm();
            });
        }
    }

    function nextStep() {
        const inputs = document.querySelectorAll("#dynamic-container input");
        errorMessages = {};

        inputs.forEach(input => {
            const name = input.name;
            const value = input.type === "file" ? input.files[0] : input.value.trim();
            
            // Validation
            if (!value) {
                errorMessages[name] = "This field is required";
            } else {
                if (name === "email" && !/^\S+@\S+\.\S+$/.test(value)) {
                    errorMessages[name] = "Invalid email format";
                }
                if (name === "phone" && !/^\d{10}$/.test(value)) {
                    errorMessages[name] = "Phone number must be 10 digits";
                }
                if (name === "password" && value.length < 6) {
                    errorMessages[name] = "Password must be at least 6 characters";
                }
                if (name === "password_confirmation" && value !== document.querySelector('input[name="password"]').value) {
                    errorMessages[name] = "Passwords do not match";
                }
            }
        });

        showErrors();

        if (Object.keys(errorMessages).length === 0) {
            inputs.forEach(input => {
                if (input.type === "file") {
                    formDataObj[input.name] = input.files[0];
                } else {
                    formDataObj[input.name] = input.value.trim();
                }
            });

            if (step === 3) {
                submitForm();
            } else {
                step++;
                updateForm();
            }
        }
    }

    function showErrors() {
        const errorElements = document.querySelectorAll("#dynamic-container .error");
        errorElements.forEach(div => {
            const fieldName = div.getAttribute("data-error-for");
            div.textContent = errorMessages[fieldName] || "";
        });
    }

    function prevStep() {
        if (step > 0) {
            step--;
            updateForm();
        }
    }

    function submitForm() {
        const formData = new FormData();
        Object.entries(formDataObj).forEach(([key, value]) => {
            formData.append(key, value);
        });

        formData.append("_token", document.querySelector('input[name="_token"]').value);

        fetch("{{ route('registration.submit') }}", {
            method: "POST",
            body: formData,
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                step++;
                updateForm();
            } else {
                Swal.fire("Error", data.message || "Validation failed", "error");
            }
        })
        .catch(err => {
            console.error(err);
            Swal.fire("Error", "Something went wrong", "error");
        });
    }

    document.addEventListener("DOMContentLoaded", () => {
        updateForm();
    });
</script>

@endsection
