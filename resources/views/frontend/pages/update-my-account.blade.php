@extends('frontend.master')
@section('main_content')
<section class="my__account--section section--padding">
    <div class="container">
<form action="" method="POST " enctype="{{-- multipart/form-data --}}"> 

    @csrf

    @method('PUT')

     <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" value="{{Auth::guard('customer')->user( )->name }}" class="form-control" placeholder="Name">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Address:</strong>
                <input type="text" name="address" value="{{Auth::guard('customer')->user( )->address }}" class="form-control" placeholder="address">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Mobile No:</strong>
                <input type="text" name="contact" value="{{Auth::guard('customer')->user( )->contact }}" class="form-control" placeholder="contact">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                <input type="text" name="email" value="{{Auth::guard('customer')->user( )->email }}" class="form-control" placeholder="email">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <a class="btn btn-warning" href="/my-account">cancel</a>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12 text-center">

            <button type="submit" class="btn btn-primary">update</button>
  
          </div>

        

      

         

    </div>

 

</form>
</div>
</section> 
@endsection