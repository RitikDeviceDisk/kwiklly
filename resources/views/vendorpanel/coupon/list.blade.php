@extends('vendorpanel.include.main')
@section('content')


                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>                    
                    <li><a href="#">Pages</a></li>
                    <li class="active">Coupon</li>
                </ul>
                <!-- END BREADCRUMB -->

                <!-- PAGE TITLE -->
                <!-- <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Coupons</h2>
                </div> -->
                <!-- END PAGE TITLE -->                

                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-default">
                            <div class="panel-heading"><h3 class="panel-title">Add Coupons</h3></div>
                            <div class="panel-body">
                                <div class="form">
                                    <form class="cmxform form-horizontal tasi-form" method="post" action="vendor_admin/Home/addCoupon" enctype="multipart/form-data">
                                        
										<div class="form-group ">
											<label for="cname" class="control-label col-lg-2">Coupon Code </label>
											<div class="col-lg-5">
												<input class="form-control" name="coupon_code" autocomplete="off" type="text">
												<input class="form-control" id="v_id" name="v_id" type="hidden" value="<?php //echo $v_id ?>" >
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label">Discount <span style="color: red">In % *</span></label>
											<div class="col-md-5">
												<input type="text" class="form-control" autocomplete="off" name="coupon_percent" id="coupon_percent" placeholder="In %">
											</div>
										</div>                            
										<!--div class="form-group">
											<label for="cname" class="control-label col-lg-2">Date <span style="color: red">*<br> </label>
											<div class="col-lg-5">
												<input class=" form-control" id="datepicker" name="coupon_date" type="text" aria-required="true"  required="">
											</div>
										</div-->
                                        <div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-10">
                                                <button class="btn btn-success" type="submit">Save</button>
                                                <button class="btn btn-default" type="button">Cancel</button>
                                            </div>
                                        </div>
                                    </form>
                            </div> <!-- panel-body -->
                        </div> <!-- panel -->
                    </div> <!-- col -->
                </div> <!-- End row -->
                </div>

                    <div class="row">
                        <div class="col-md-12">

                            <!-- START DEFAULT DATATABLE -->
                            <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Coupon List
                      
                            </div>
                                <div class="panel-body">
                                    <div class="table-responsive">

                                        <table class="table table-striped table-bordered datatable">
                                <thead>
                                    <tr>
                                        <th>SNo.</th>
                                        <th>Coupon Code</th>
                                        <th>% Discount</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    if(!empty($coupons)){
                                    $i=1;  
									foreach($coupons as $coupon) { 
                                        $a= $i++;
                                        //$pid = base64_encode($coupon->coupon_id);
                                        $Edit = 'vendor_admin/Home/EditCoupon';
                                        //$Delete = 'Home/DeleteCoupon';
                                        $coupon_date =date('d-m-Y',strtotime($coupon->coupon_date));
                                        //$product_save_percent = number_format($coupon->product_save_percent , 2, '.', '');  
                                    echo "<tr>
                                        <td>$a</td>
                                        <td>$coupon->coupon_code</td>
                                        <td>$coupon->coupon_percent</td>
                                        <td>$coupon->coupon_type</td>
                                        <td>$coupon_date</td>
                                        <td>
                                            <a href='".$Edit."?id=".$coupon->coupon_id."' class='btn btn-success tooltips' data-placement='top' data-toggle='tooltip' data-original-title='Edit'>
                                            <i class='fa fa-pencil'></i>
                                            </a>                                        
                                        </td>                                        
                                    </tr>";}}
                                   ?> 
                                   <script>
                                    function doconfirm()
                                    {
                                        job=confirm("Are you sure to delete permanently?");
                                        if(job!=true)
                                        {
                                            return false;
                                        }
                                    }
                                    </script>
                                </tbody>
                            </table>
                                    </div>
                                </div>
                            </div>
                            <!-- END DEFAULT DATATABLE -->
                         </div>
                    </div>                                
                    
                </div>
                <!-- PAGE CONTENT WRAPPER -->                                
            </div>    
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->
@endsection