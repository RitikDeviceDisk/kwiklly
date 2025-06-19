<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>Kwiklly</title>           
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="{{ asset('public/web/images/logo.png')}}" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="{{ asset('public/assets/vendor/css/theme-default.css')}}"/>
        <!-- EOF CSS INCLUDE --> 
         <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','../../../www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-62751496-1', 'auto');
        ga('send', 'pageview');

      </script>
    </head>
    
<body>
@php
                                $vendor = auth()->user();
                            @endphp
        <!-- START PAGE CONTAINER -->
        <div class="page-container">
            
            <!-- START PAGE SIDEBAR -->
            <div class="page-sidebar">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">
                    <li class="xn-logo">
                        <a href="">Kwiklly</a>
                        <a href="{{ route('vendor.dashboard')}}" class="x-navigation-control"></a>
                    </li>
                    <li class="xn-profile">
                        <a href="#" class="profile-mini">
                                        <img src="{{ asset('web/images/logo.png')}}" alt="Kwiklly" />
                                        <!--<img src="../../upload_img/vendor_reg/static_img/store.jpg" alt="" style="width:200px" class="br-radius">-->
                                        <img src="../$detail[0]->v_business_logo" alt="Kwiklly" />
                        </a>
                        <div class="profile">
                            <div class="profile-image">
                                        <!-- <img src="{{ asset('web/images/logo.png')}}" /> -->
                                        <!--<img src="../../upload_img/vendor_reg/static_img/store.jpg" alt="" style="width:200px" class="br-radius">-->
                                        <img src="{{ asset('public/'.$vendor->business_logo)}}" alt="" >   
                            </div>
                         
                            <div class="profile-data">
                                <div class="profile-data-name">Welcome ! Vendor -  {{$vendor->business_name}}</div>
                                <div class="profile-data-title">Your Email  -  {{$vendor->email}}</div>
                            </div>
                            <div class="profile-controls">
                                <a href="{{ route('vendor.profile')}}" class="profile-control-left"><span class="fa fa-info"></span></a>
                                <a href="#" class="profile-control-right"><span class="fa fa-envelope"></span></a>
                            </div>
                        </div>                                                                        
                    </li>
                    <li class="xn-title"><a href="{{ route('vendor.dashboard')}}"><span class="fa fa-dashboard"></span> <span class="xn-text">Dashboards</span></a></li>
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-pencil"></span> <span class="xn-text">Manage Category</span></a>
                        <ul>                            
                            <li><a href="{{ route('vendor.categories')}}"><span class="fa fa-list-ul"></span> Category</a></li>
                            <!-- <li><a href="{{ route('vendor.subcategories.index')}}"><span class="fa fa-list-alt"></span> Subcategory</a></li>                             -->
                        </ul>
                    </li>
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">Manage Product</span></a>
                        <ul>
                            <li><a href="{{ route('vendor.prolist')}}"><span class="fa fa-image"></span>Product List</a></li>
							
                            <!-- <li><a href="vendor_admin/Home/Custompizzaproduct"><span class="fa fa-image"></span> Add Custom Pizza Product</a></li>
                            <li><a href="vendor_admin/Home/DisplayProduct"><span class="fa fa-file-text-o"></span> Display Product</a></li>
                            <li><a href="vendor_admin/Home/search_product"><span class="fa fa-search"></span> Search Product</a></li>
                            <li><a href="vendor_admin/Home/importproducts"><span class="fa fa-cogs"></span> Import Bulk Products</a></li>
							<li><a href="vendor_admin/Home/importvariantproducts"><span class="fa fa-cogs"></span> Import Variant Bulk Products</a></li> -->
                        </ul> 
                    </li>
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-cogs"></span> <span class="xn-text">Manage Orders</span></a>                        
                        <ul>
                            <li><a href="{{ route('vendor.orderlist')}}"><span class="fa fa-heart"></span> Orders List</a></li>                            
                            <li><a href="vendor_admin/Home/orderreport"><span class="fa fa-search"></span> Orders Search</a></li>
                        </ul>
                    </li>
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-cogs"></span> <span class="xn-text">Manage Coupon</span></a>                        
                        <ul>
                            <li><a href="{{ route('vendor.couponlist')}}"><span class="fa fa-heart"></span> Coupon</a></li>                            
                            <!--li><a href="Home/orderreport');pan class="fa fa-search"></span> Orders Search</a></li-->
                        </ul>
                    </li>                    
                  </ul>
                <!-- END X-NAVIGATION -->
            </div>
            <!-- END PAGE SIDEBAR -->
            
            <!-- PAGE CONTENT -->
            <div class="page-content">
                
                <!-- START X-NAVIGATION VERTICAL -->
                <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                    <!-- TOGGLE NAVIGATION -->
                    <li class="xn-icon-button">
                        <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
                    </li>
                    <!-- END TOGGLE NAVIGATION -->
                    <!-- SEARCH -->
                    <li class="xn-search">
                        <form role="form">
                            <input type="text" name="search" placeholder="Search..."/>
                        </form>
                    </li>   
                    <!-- END SEARCH -->                    
                    <!-- POWER OFF  -->
                    <li class="xn-icon-button pull-right last">
                        <a href="#"><span class="fa fa-power-off"></span></a>
                        <ul class="xn-drop-left animated zoomIn">
                            <li><a href="{{route('vendor.profile')}}"><span class="fa fa-user"></span> Profile</a></li>
                            <li><a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span> Sign Out</a></li>
                        </ul>                        
                    </li> 
                    <!-- END POWER OFF -->                    
                    <!-- MESSAGES -->
                    <li class="xn-icon-button pull-right">
                        <a href="#"><span class="fa fa-comments"></span></a>
                        
                    </li>
                    <!-- END MESSAGES -->
                    <!-- TASKS -->
                    <li class="xn-icon-button pull-right">
                        <a href="#"><span class="fa fa-tasks"></span></a>
                        
                    </li>
                    <!-- END TASKS -->
                    <!-- LANG BAR -->
                    <li class="xn-icon-button pull-right">
                        <a href="#"><span class="flag flag-gb"></span></a>
                        <ul class="xn-drop-left xn-drop-white animated zoomIn">
                            <li><a href="#"><span class="flag flag-gb"></span> English</a></li>
<!--                            <li><a href="#"><span class="flag flag-de"></span> Deutsch</a></li>
                            <li><a href="#"><span class="flag flag-cn"></span> Chinese</a></li>-->
                        </ul>                        
                    </li> 
                    <!-- END LANG BAR -->
                </ul>
                <!-- END X-NAVIGATION VERTICAL -->