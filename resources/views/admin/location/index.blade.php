@extends('admin.includes.main')

@section('main')
<div class="wraper container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="msg-container">
                            </div>

            <div class="panel panel-default">
                <div class="panel-heading">

                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="panel-title">Pincode Locations</h3>
                        </div>
                        <div class="col-sm-6 text-right">
                            <a href="https://kwiklly.com/chef_admin/Home/pincode_create" class="btn btn-info">+Add</a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div id="datatable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer"><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="datatable_length"><label>Show <select name="datatable_length" aria-controls="datatable" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-6"><div id="datatable_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="datatable"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="datatable" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="datatable_info">
                                <thead>
                                    <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="S No.: activate to sort column descending" style="width: 86.2308px;">S No.</th><th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Pincode: activate to sort column ascending" style="width: 117.231px;">Pincode</th><th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Place: activate to sort column ascending" style="width: 451.231px;">Place</th><th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="State: activate to sort column ascending" style="width: 140.231px;">State</th><th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 133px;">Action</th></tr>
                                </thead>
                                <tbody>

                                <tr role="row" class="odd">
                                        <td class="sorting_1">1</td>
                                        <td>201301</td>
                                        <td>Noida, Uttar Pradesh</td>
                                        <td>Uttar Pradesh</td>
                                        <td>
                                            <a href="https://kwiklly.com/chef_admin/Home/pincode_edit/3" class="btn btn-success tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Edit">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <a href="https://kwiklly.com/chef_admin/Home/DeletePincodePlace?id=3" class="btn btn-danger tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Delete" onclick="return doconfirm();">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr><tr role="row" class="even">
                                        <td class="sorting_1">2</td>
                                        <td>110017</td>
                                        <td>Malviya Nagar, New Delhi, Delhi</td>
                                        <td>Delhi</td>
                                        <td>
                                            <a href="https://kwiklly.com/chef_admin/Home/pincode_edit/4" class="btn btn-success tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Edit">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <a href="https://kwiklly.com/chef_admin/Home/DeletePincodePlace?id=4" class="btn btn-danger tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Delete" onclick="return doconfirm();">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr><tr role="row" class="odd">
                                        <td class="sorting_1">3</td>
                                        <td>110017</td>
                                        <td>Saket, New Delhi, Delhi</td>
                                        <td>Delhi</td>
                                        <td>
                                            <a href="https://kwiklly.com/chef_admin/Home/pincode_edit/7" class="btn btn-success tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Edit">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <a href="https://kwiklly.com/chef_admin/Home/DeletePincodePlace?id=7" class="btn btn-danger tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Delete" onclick="return doconfirm();">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr><tr role="row" class="even">
                                        <td class="sorting_1">4</td>
                                        <td>273001</td>
                                        <td>Gorakhnath Road, Gorakhpur, Uttar Pradesh</td>
                                        <td>Uttar Pradesh</td>
                                        <td>
                                            <a href="https://kwiklly.com/chef_admin/Home/pincode_edit/8" class="btn btn-success tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Edit">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <a href="https://kwiklly.com/chef_admin/Home/DeletePincodePlace?id=8" class="btn btn-danger tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Delete" onclick="return doconfirm();">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr><tr role="row" class="odd">
                                        <td class="sorting_1">5</td>
                                        <td>110080</td>
                                        <td>New Delhi 110080, Delhi</td>
                                        <td>Delhi</td>
                                        <td>
                                            <a href="https://kwiklly.com/chef_admin/Home/pincode_edit/9" class="btn btn-success tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Edit">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <a href="https://kwiklly.com/chef_admin/Home/DeletePincodePlace?id=9" class="btn btn-danger tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Delete" onclick="return doconfirm();">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr><tr role="row" class="even">
                                        <td class="sorting_1">6</td>
                                        <td>272001</td>
                                        <td>Basti Sadar, Uttar Pradesh</td>
                                        <td>Uttar Pradesh</td>
                                        <td>
                                            <a href="https://kwiklly.com/chef_admin/Home/pincode_edit/10" class="btn btn-success tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Edit">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <a href="https://kwiklly.com/chef_admin/Home/DeletePincodePlace?id=10" class="btn btn-danger tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Delete" onclick="return doconfirm();">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr><tr role="row" class="odd">
                                        <td class="sorting_1">7</td>
                                        <td>226006</td>
                                        <td>Lucknow, Uttar Pradesh</td>
                                        <td>Uttar Pradesh</td>
                                        <td>
                                            <a href="https://kwiklly.com/chef_admin/Home/pincode_edit/11" class="btn btn-success tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Edit">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <a href="https://kwiklly.com/chef_admin/Home/DeletePincodePlace?id=11" class="btn btn-danger tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Delete" onclick="return doconfirm();">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr><tr role="row" class="even">
                                        <td class="sorting_1">8</td>
                                        <td>80002</td>
                                        <td>Patna, Bihar</td>
                                        <td>Bihar</td>
                                        <td>
                                            <a href="https://kwiklly.com/chef_admin/Home/pincode_edit/12" class="btn btn-success tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Edit">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <a href="https://kwiklly.com/chef_admin/Home/DeletePincodePlace?id=12" class="btn btn-danger tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Delete" onclick="return doconfirm();">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr><tr role="row" class="odd">
                                        <td class="sorting_1">9</td>
                                        <td>800001</td>
                                        <td>anishabad  patana bihar</td>
                                        <td>Bihar</td>
                                        <td>
                                            <a href="https://kwiklly.com/chef_admin/Home/pincode_edit/13" class="btn btn-success tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Edit">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <a href="https://kwiklly.com/chef_admin/Home/DeletePincodePlace?id=13" class="btn btn-danger tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Delete" onclick="return doconfirm();">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr></tbody>
                            </table></div></div><div class="row"><div class="col-sm-6"><div class="dataTables_info" id="datatable_info" role="status" aria-live="polite">Showing 1 to 9 of 9 entries</div></div><div class="col-sm-6"><div class="dataTables_paginate paging_simple_numbers" id="datatable_paginate"><ul class="pagination"><li class="paginate_button previous disabled" aria-controls="datatable" tabindex="0" id="datatable_previous"><a href="#">Previous</a></li><li class="paginate_button active" aria-controls="datatable" tabindex="0"><a href="#">1</a></li><li class="paginate_button next disabled" aria-controls="datatable" tabindex="0" id="datatable_next"><a href="#">Next</a></li></ul></div></div></div></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
