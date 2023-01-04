@extends('admin.master')
@section('main_content')


<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">eCommerce</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Orders</li>
                    </ol>
                </nav>
            </div>
            
        </div>
        <!--end breadcrumb-->
      
        <div class="card">
            <div class="card-body">
                <div class="d-lg-flex align-items-center mb-4 gap-3">
                    <div class="position-relative">
                        <input type="text" class="form-control ps-5 radius-30" placeholder="Search Order"> <span class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search"></i></span>
                    </div>
                  <div class="ms-auto"><a href="javascript:;" class="btn btn-primary radius-30 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>Add New Order</a></div>
                </div>
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Invoice</th>
                                <th>Company Name</th>
                                <th>Line Item</th>
                                <th>Order Confirmed</th>
                                <th>production</th>
                                <th>packaging</th>
                                <th>Delivery</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="ms-2">
                                            <h6 class="mb-0 font-14">#OS-000354</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>Gaspur Antunes</td>
                                <td>9</td>
                                <td>
                                <select name="Orderconfirmed" id="Orderconfirmed">
                                    <option value="Order process">in process</option>
                                    <option value="Order confirmed">Order Confirmed</option>
                                  </select>
                                </td>
                                <td>
                                    <select name="Orderproduction" id="Orderproduction">
                                        <option value="Order process">in process</option>
                                        <option value="Order confirmed">Order Confirmed</option>
                                      </select>
                                </td>
                                <td>
                                    <select name="Orderpackaging" id="Orderpackaging">
                                        <option value="Order process">in process</option>
                                        <option value="Order confirmed">Confirmed</option>
                                      </select>
                                </td>
                                <td>
                                    <select name="Orderdelivery" id="Orderdelivery">
                                        <option value="Order process">in process</option>
                                        <option value="Order delivery">Delivered</option>
                                      </select>
                                </td>
                                
                                
                                <td>
                                    <div class="d-flex order-actions">
                                        <a href="javascript:;" class=""><i class='bx bxs-edit'></i></a>
                                        <a href="javascript:;" class="ms-3"><i class='bx bxs-trash'></i></a>
                                    </div>
                                </td>
                            </tr>
                            
                               
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>
</div>
<!--end page wrapper -->


@endsection