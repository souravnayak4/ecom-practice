@extends('frontend.master')
@section('main_content')
         {{--  @foreach ($customer->notifications as $notification  )
          <li><i class="bx bx-user"></i><h5 style="color:rgb(255, 0, 93);">A new product is being released &nbsp;:{{$notification->data['product_name'] }}</h5></a>
          </li>
          @endforeach --}}



          <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10 col-xl-8 mx-auto">
                  
                    <div class="my-4">
                        <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Notifications</a>
                            </li>
                        </ul>

                       
                        <div class="list-group mb-5 shadow">
                            <div class="list-group-item">
                                <div class="row align-items-center">
                                    <div class="col">@foreach ($customer->notifications as $notification  )
                                        <strong class="mb-0"><h3 style="color:rgb(0, 4, 255);">A new product is being released &nbsp;:{{$notification->data['product_name'] }}</h3></strong>
                                       
                                        @endforeach
                                    </div>
                                   
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
            
            </div>
            
        @endsection