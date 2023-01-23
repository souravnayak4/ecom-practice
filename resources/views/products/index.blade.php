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

           

            <div class="pull-right">
               
                <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
                
            </div>
           
        </div>
       
    </div>
    &nbsp;
    <div class="row">
        <div class="col-lg-12 margin-tb">
        <div class="pull-right">
               
            <a class="btn btn-success" href="excel-products"> export  Product excel </a>
            <a class="btn btn-success" href="import-excel-products">import export  Product excel </a>
            
        </div>
       </div>
    </div>
    

    @if ($message = Session::get('success'))

        <div class="alert alert-success">

            <p>{{ $message }}</p>

        </div>

    @endif

     

    <table class="table table-bordered">

        <tr>

            <th>No</th>

            <th>Image</th>

            <th>Name</th>

            <th>Details</th>

            <th width="280px">Action</th>

        </tr>

        @foreach ($products as $product)

        <tr>

            <td>{{ ++$i }}</td>

            <td><img src="/image/{{ $product->image }}" width="100px"></td>

            <td>{{ $product->name }}</td>

            <td>{{ $product->detail }}</td>

            <td>

                <form action="{{ route('products.destroy',$product->id) }}" method="POST">

     

                    <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>

      

                    <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>

     

                    @csrf

                    @method('DELETE')

        

                    <button type="submit" class="btn btn-danger">Delete</button>

                </form>

            </td>

        </tr>

        @endforeach

    </table>

    

    {!! $products->links() !!}

        

@endsection