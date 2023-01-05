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
           
            <a class="btn btn-success" href="{{ route('subadmins.create') }}"> ADD SUBADMIN</a>

        </div><br>

    </div>

</div>



@if ($message = Session::get('success'))

    <div class="alert alert-success">

        <p>{{ $message }}</p>

    </div>

@endif

 

<table class="table table-bordered">

    <tr>

        <th>Name</th>

        <th>contact</th>

        <th>email</th>

        

        <th width="280px">Action</th>

    </tr>

    @foreach ($subadmins as $subadmin)

    <tr>

        

       

        <td>{{ $subadmin->name }}</td>
        <td>{{ $subadmin->contact }}</td>
        <td>{{ $subadmin->email }}</td>

        <td>

            <form action="{{ route('products.destroy',$subadmin->id) }}" method="POST">

 

                <a class="btn btn-info" href="{{ route('subadmins.show',$subadmin->id) }}">Show</a>

  

                <a class="btn btn-primary" href="{{ route('subadmins.edit',$subadmin->id) }}">Edit</a>

 

                @csrf

                @method('DELETE')

    

                <button type="submit" class="btn btn-danger">Delete</button>

            </form>

        </td>

    </tr>

    @endforeach

</table>



{!! $subadmins->links() !!}

    

@endsection