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
                        <li class="breadcrumb-item active" aria-current="page"><a  href="{{ route('products.index') }}"> Back</a></li>
                    </ol>
                    
                </nav>
            </div>
            
        </div>
        <!--end breadcrumb-->

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                

            </div>

            <div class="pull-right">

               
            </div>

        </div>

    </div>
    

    </div>

    

				 <div class="card p-3">
					<div class="row g-0">
					  <div class="col-md-4">
                        <img src="/image/{{ $product->image }}" width="200px">

						
					  </div>
					  <div class="col-md-8">
						<div class="card-body">
						  <h4 class="card-title"> {{ $product->product_name }}
                        </h4>
						  <div class="d-flex gap-3 py-3">
							<div class="cursor-pointer">
								<i class='bx bxs-star text-warning'></i>
								<i class='bx bxs-star text-warning'></i>
								<i class='bx bxs-star text-warning'></i>
								<i class='bx bxs-star text-warning'></i>
								<i class='bx bxs-star text-secondary'></i>
							  </div>	
							  
							  
						  </div>
						  <div class="mb-3"> 
							<span class="price h4">RS: {{ $product->price }}</span> 
							 
						</div>
						  <p class="card-text fs-6"></p>
						  <dl class="row">
							<dt class="col-sm-3">Category</dt>
							<dd class="col-sm-9">  {{ $product->category->name }}</dd>
						  
							<dt class="col-sm-3">Subcategory</dt>
							<dd class="col-sm-9">{{  $product->subcategory->subcategory_name }}</dd>
						  
							<dt class="col-sm-3">Status</dt>
							<dd class="col-sm-9">    <td>
                                @if( $product->status==0 )
                                   <h5 style="color:green;">  Active</h5>
                                @elseif( $product->status==1 )
                                <h5 style="color:red;"> Dactive</h5>
                                @endif
                
                            </td></dd>
						  </dl>
						  <hr>
						  
							
						</div>
						
						
					</div>
                    <hr/>
					<div class="card-body">
						<ul class="nav nav-tabs nav-primary mb-0" role="tablist">
							<li class="nav-item" role="presentation">
								<a class="nav-link active" data-bs-toggle="tab" href="#primaryhome" role="tab" aria-selected="true">
									<div class="d-flex align-items-center">
										<div class="tab-icon"><i class='bx bx-comment-detail font-18 me-1'></i>
										</div>
										<div class="tab-title"> Product Description </div>
									</div>
								</a>
							</li>
							
							
						</ul>
						<div class="tab-content pt-3">
							<div class="tab-pane fade show active" id="primaryhome" role="tabpanel">
								<p>{{ $product->detail }}</p>
								
							</div>
						</div>
					</div>

				  </div>


					
					   </div>
					
				  
			</div>
		</div>

@endsection