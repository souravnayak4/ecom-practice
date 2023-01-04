
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
                        <li class="breadcrumb-item active" aria-current="page">change password</li>
                    </ol>
                </nav>
            </div>
            
        </div>
        <!--end breadcrumb-->
<form method="" action="">
    
    <div class="form-group">
        <label for="exampleInputPassword1">Old Password</label>
        <input name="oldpassword" type="password" class="form-control" id="oldpassword" placeholder="Password">
      </div>
    <div class="form-group">
        <label for="exampleInputPassword1">New Password</label>
        <input name="newpassword" type="password" class="form-control" id="newpassword" placeholder="Password">
      </div>
    
    <div class="form-group">
      <label for="exampleInputPassword1">confirm Password</label>
      <input name="confirm_password"  class="form-control"  type="password" id="confirm_password" placeholder="Password">
    </div><br><br>
   
    <button type="submit" class="btn btn-primary">Update</button>
  </form>


@endsection