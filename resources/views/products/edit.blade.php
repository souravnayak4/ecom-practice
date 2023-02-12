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
        <!--end breadcrumb-->

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Edit Product</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>

            </div>

        </div>

    </div>

     

    @if ($errors->any())

        <div class="alert alert-danger">

            <strong>Whoops!</strong> There were some problems with your input.<br><br>

            <ul>

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif

    

    <form action="{{ route('products.update',$product->id) }}" method="POST" enctype="multipart/form-data"> 

        @csrf

        @method('PUT')

         <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="product_name" value="{{ $product->product_name }}" class="form-control" placeholder="Name">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Price:</strong>
                    <input type="text" name="price" value="{{ $product->price }}" class="form-control" placeholder="Name">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Detail:</strong>
                    <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail">{{ $product->detail }}</textarea>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Image:</strong>

                    <input type="file" name="image" class="form-control" placeholder="image">

                    <td><img src="/image/{{ $product->image }}" width="100px"></td>

                </div>

            </div>
            <div class="form-group">
                <label>category</label>
                <select class="form-control" name="category_id">
                    <option value="">Select category </option>                               
                        <option value={{ $product->category->category_id }}><td>{{ $product->category->name }}</td></option>                                   
                        <input type="hidden" name="category_id" value="{{$product->category_id}}">
                    </select>
            </div>

           {{--  <div class="form-group">
                <label>category</label>
                <select class="form-control" name="category_id">
                    <option value="">Select category </option>                               
                        <option value={{ $product->subcategory->subcategory_id }}><td>{{ $product->subcategory->subcategory_name }}</td></option>                                   
                </select>
            </div>--}}
            <div class="col-xs-12 col-sm-12 col-md-12">
                <td>          
                    <select name="status" class="form-control">                  
                      <option value="0">Enable</option>
                      <option value="1">Disable</option>           
                    </select>
                </td>
                </div> 
            
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">

              <button type="submit" class="btn btn-primary">Submit</button>

            </div>

        </div>

     

    </form>

@endsection