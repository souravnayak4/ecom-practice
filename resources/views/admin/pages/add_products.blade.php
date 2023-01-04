
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
                        <li class="breadcrumb-item active" aria-current="page">add products</li>
                    </ol>
                </nav>
            </div>
            
        </div>
        <!--end breadcrumb-->

<div class="row">
    <div class="col-xl-9 mx-auto">
        <h6 class="mb-0 text-uppercase">Text Inputs</h6>
        <hr/>
        <form method="post" action="{{url('add-products')}}" enctype="">
            @csrf
        <div class="card">
            <div class="card-body">
                <select class="form-select mb-3" aria-label="Default select example">
                    <option selected>category</option>
                    @foreach($all_category as $category)
                    <option value="{{$category->category_id}}">{{$category->category_name}}</option>
                    @endforeach
                </select>
                <select class="form-select mb-3" aria-label="Default select example">
                    <option selected>subcategory</option>
                    @foreach($all_subcategory as $category)
                    <option value="{{$category->subcategory_id}}">{{$category->subcategory_name}}</option>
                    @endforeach
                </select>
                
                <div class="form-group">
                    <label>product</label>
                    <input class="form-control" type="file" name="">
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>product_details</label>
                        <input type="product_details" class="form-control" placeholder="product_details">
                    </div>
                </div>

                                                                                                                      
                
               
                <div class="col-auto my-1">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
            </div>
        </div>

 @endsection
 