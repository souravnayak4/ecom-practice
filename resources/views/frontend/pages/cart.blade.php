 <!-- cart section start -->
 
 @extends('frontend.master')
@section('main_content')
 
 <section class="cart__section section--padding">
    <div class="container-fluid">
        <div class="cart__section--inner">
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">product titel</th>
                    <th scope="col">quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">image</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <?php  $totalprice=0; ?>
                @foreach($cart as $cart)
                    
                
                <tbody>
                  <tr>
                    <th >{{$cart->product_name}}</th>
                    <td>{{$cart->quantity}}</td>
                    <td>{{$cart->price}}</td>
                   <td><img src="/image/{{$cart->image}}" width="50" height="50"></td>
                   <td><a   onclick="return confirm('are you sure to delete product?')" href="{{url('/remove_cart',$cart->id)}}">Remove Product</a></td>
                  </tr>
                 
                </tbody>
              </table>
              <?php $totalprice=$totalprice + $cart->price ?>
              @endforeach
              <div>
                  <h1> Total price:  {{$totalprice}}</h1>
              </div>
                            <div class="cart__summary--footer">
                                <p class="cart__summary--footer__desc">Shipping & taxes calculated at checkout</p>
                                <ul class="d-flex justify-content-between">
                                    <li><button class="cart__summary--footer__btn primary__btn cart" type="submit">Update Cart</button></li>
                                    <li><a class="cart__summary--footer__btn primary__btn checkout" href="{{url('cash_order')}}">Cash on deleviry</a></li>
                                </ul>
                            </div>
                        </div> 
                    </div>
                </div> 
            </form> 
        </div>
    </div>     
</section>
<!-- cart section end -->

@endsection