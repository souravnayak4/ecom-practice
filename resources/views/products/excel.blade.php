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
<div class="container">
<h4>add products</h4>
<form  action="{{ route('import-products') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label>select file</label>
    <input type="file" name="file" class="form-control">
    <div class="mt-5">
        <button type="submit" class="btn btn-info">submit</button>
    </div>   
</form>
</div>    


@endsection