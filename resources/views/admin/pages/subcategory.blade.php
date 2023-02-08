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
                        <li class="breadcrumb-item active" aria-current="page">Sub category Management</li>
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
                  <div class="ms-auto"><a href="/add-subcategory" class="btn btn-primary radius-30 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>Add New subcategory</a></div>
                </div>
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Subcategory name</th> 
                                <th>Subcategory </th>
                                <th>Action</th>
                                <th>Delete </th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach($all_subcategory as $s_category)
                            
                            
                            <tr>
                                <td>{{ $s_category->subcategory_name }}</td>
                                
                                <td>
                                    @if($s_category->status==0 )
                                       <h5 style="color:green;">  Active</h5>
                                    @elseif($s_category->status==1 )
                                    <h5 style="color:red;">  Dactive</h5>
                                    @endif

                                </td>                              
                                <td>
                                    <div class="d-flex order-actions">
                                    <a class="btn btn-primary" href="{{ route('products.update-subcategory',$s_category->subcategory_id) }}">update</a> </div>           
                                </td>
                                <td>
                                    <div class="d-flex order-actions">
                                        <a href="{{URL::to('delete-subcategory/'.$s_category->subcategory_id)}}" class="ms-3"><i class='bx bxs-trash'></i></a>
                                </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>


                        
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end page wrapper -->


@endsection