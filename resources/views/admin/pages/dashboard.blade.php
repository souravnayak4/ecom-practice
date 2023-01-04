@extends('admin.master')
@section('main_content')



<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">

      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">Company Name</th>
            <th scope="col">Key Person</th>
            <th scope="col">Email</th>
            <th scope="col">Country</th>
            <th scope="col">Phone</th>
            <th scope="col">Enquiry Status</th>
            <th scope="col">Order Status</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            
            <td>Company Name</td>
            <td>Key Person</td>
            <td>sn@gmail</td>
            <td>7029777777</td>
            <td>
              <select name="Orderdelivery" id="Orderdelivery">
                <option value="default">default</option>
                  <option value="Order process">in process</option>
                  <option value="Order delivery">success</option>
                </select>
          </td>
          <td>
            <select name="Orderdelivery" id="Orderdelivery">
              <option value="default">default</option>
                <option value="Order process">in process</option>
                <option value="Order delivery">success</option>
              </select>
        </td>

          <td>
          <select name="Orderdelivery" id="Orderdelivery">
            <option value="default">default</option>
              <option value="Order process">in process</option>
              <option value="Order delivery">success</option>
            </select>
          </td>

          <td><button type="button" class="btn btn-primary btn-sm radius-30 px-4">View Details</button></td>
          </tr>
        </tbody>
      </table>   
        
          

    </div>
</div>
<!--end page wrapper -->



@endsection