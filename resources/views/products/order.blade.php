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
                        <li class="breadcrumb-item active" aria-current="page">product</li>
                    </ol>
                </nav>
            </div>
            
        </div>
        <div class="h1" style="text-align: center;">All Products</div>
        <!--end breadcrumb-->
<table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Mobile No</th>
        <th scope="col">Address</th>
        <th scope="col">Product Name</th>
        <th scope="col">Price </th>
        <th scope="col">Quantity</th>
        <th scope="col">Payment_status</th>
        <th scope="col">Delivery_status</th>
        <th scope="col">Image</th>
      </tr>
    </thead>
    @foreach ($order as $order)
        
    
    <tbody>
      <tr>
        
        <td>{{$order->name}}</td>
        <td>{{$order->email}}</td>
        <td>{{$order->contact}}</td>
        <td>{{$order->address}}</td>
        <td>{{$order->product_name}}</td>
        <td>{{$order->price}}</td>
        <td>{{$order->quantity}}</td>
        <td>{{$order->payment_status}}</td>
        <td>{{$order->delivery_status}}</td>
        <td><img src="/image/{{$order->image}}" width="50" height="50"></td>
      </tr>
      
    </tbody>
    @endforeach
  </table>
@endsection