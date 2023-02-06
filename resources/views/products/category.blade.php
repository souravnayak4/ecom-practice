@extends('admin.master')
@section('main_content')

<script type="text/javascript">
    function check_delete() {
        chk = confirm("Are you sure to delete item ?");
        if (chk) {
            return true;
        } else {
            return false;
        }
    }

</script>
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
      
        <div class="card">
            <div class="card-body">
                <div class="d-lg-flex align-items-center mb-4 gap-3">
                    <div class="position-relative">
                        <input type="text" class="form-control ps-5 radius-30" placeholder="Search Order"> <span class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search"></i></span>
                    </div>
                  <div class="ms-auto"><a href="/add-products-category" class="btn btn-primary radius-30 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>Add New Category</a></div>
                  
                </div>
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead class="table-light">
                            <tr> 
                                <th>Category Name</th>
                                <th>Actions</th>
                                <th>Category Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($all_category as $category)                       
                            <tr>
                                <td>{{ $category->name }}</td>
                                <td><a href="{{URL::to('delete-products-category/'.$category->id)}}" data-toggle="tooltip" data-original-title="Close"onclick="return check_delete();">Delete  
                                    <a class="btn btn-primary" href="{{ route('products.update-category',$category->id) }}">EDIT</a>
                                </td>
                                <td>
                                    @if( $category->status==0 )
                                       <h5 style="color:green;">  Active</h5>
                                    @elseif( $category->status==1 )
                                    <h5style="color:green;">  Dactive</h6>
                                    @endif

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