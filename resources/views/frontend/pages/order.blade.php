@extends('frontend.master')
@section('main_content')
 <section class="cart__section section--padding">
    <div class="container-fluid">
        <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">Product Name</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
                <th scope="col">Payment </th>
                <th scope="col">Delivery Status</th>
                <th scope="col">Image</th>
                <th scope="col">Cancel Order</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($order as $order)  
              <tr>
                <th scope="row">{{$order->product_name}}</th>
                <td>{{$order->quantity}}</td>
                <td>{{$order->price}}</td>
                <td>{{$order->payment_status}}</td>
                <td>{{$order->delivery_status}}</td>
                <td><img src="/image/{{$order->image}}" width="100" height="100" ></td>
               
             
             <td>@if($order->delivery_status=='processing')<a href="{{url('cancel_order',$order->id)}}" type="button" class="btn btn-danger" onclick="return confirm('are you sure to cancel this order !!!')">cancel order
            @else
            <p>Delivered</p>
            @endif
        </td>
             </tr>
             @endforeach
            </tbody>
          </table>
    </div>
 </section>
@endsection