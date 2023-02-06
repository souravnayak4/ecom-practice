
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
                        <li class="breadcrumb-item active" aria-current="page">category Management</li>
                    </ol>
                </nav>
            </div>
            
        </div>
        <!--end breadcrumb-->

        <form method="post" action="/update-product-category">
          @csrf
         <div class="form-row align-items-center">
          <div class="ms-auto"><a href="/all-category" class="btn btn-primary radius-30 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>back </a></div>
             <h1>update Category</h1>
             <div class="form-group">
                <label>Clinic Name</label>
                <input class="form-control" type="text" name="name" value="{{$category->name}}">
              <input type="hidden" name="id" value="{{$category->id}}">
              </div>
             <div>
             <td>          
              <select name="status" class="form-control">                  
                      <option value="0">Enable</option>
                      <option value="1">Disable</option>           
              </select>
            </td>
          </div>
           <div class="col-auto my-1">
             <button type="submit" class="btn btn-primary">Submit</button>
           </div>
         </div>
       </form>

  
  @endsection