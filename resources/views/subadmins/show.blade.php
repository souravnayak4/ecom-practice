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
                        <li class="breadcrumb-item active" aria-current="page">subamin</li>
                    </ol>
                </nav>
            </div>
            
        </div>
        <!--end breadcrumb-->

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2> {{ $subadmin->id}}</h2>

            </div>
            
            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('subadmins.index') }}"> Back</a>
                
            </div>

        </div>

    </div>

     

    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Name:</strong>

                {{ $subadmin->name }}

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>contact</strong>

                {{ $subadmin->contact }}

            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>contact</strong>

                {{ $subadmin->email }}

            </div>

        </div>
      

    </div>

@endsection