@extends('admin.admin_layouts')

@section('admin_content')	
<div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{route('admin')}}">AMAR Dukan</a>
        <span class="breadcrumb-item active">Product Section</span>
      </nav>

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Show Product Details</h5>
         
        </div>
    
        <div class="card pd-20 pd-sm-40">
            
            <h6 class="card-body-title">
          <a href="{{route('product.edit',['id' => $product->id]) }}" class="btn btn-info btn-sm pull-right">Update Product</a></h6>
    <div class="single_product">
		<div class="container">
			<div class="row">

				<!-- Images -->
				<div class="col-lg-2 order-lg-1 order-2">
					<ul class="image_list">
						<li><img src="{{URL::to($product->image_one)}}" height="80px;" width="auto"></li>
                        <br>
                        <br>
						<li ><img src="{{URL::to($product->image_two)}}" height="80px;" width="auto"></li>
                        <br>
                        <br>
						<li ><img src="{{URL::to($product->image_three)}}" height="80px;" width="auto"></li>
					</ul>
				</div>

				<!-- Selected Image -->
				<div class="col-lg-5 order-lg-2 order-1">
					<div class="image_selected"><img src="{{URL::to($product->image_one)}}" alt=""></div>
                    </div>
                    <div class="col-lg-5 order-4">
                        <h6>Product Video</h6>
                        <div class="embed-responsive embed-responsive-16by9"><iframe  src="{{$product->video_link}}" allowfullscreen></iframe>
                                </div>
                    
                    	
				</div>

				<!-- Description -->
				<div class="col-lg-5 order-3">
					<div class="product_description">
						<div class="text-success">Category : {{$product->category_name}}</div>
                        <div class="text-primary">Subcategory : {{$product->subcategory_name}}</div>
                        <div class="text-warning">Brand : {{$product->brand_name}}</div>
                        <div class="font-weight-bold">Product Code : {{$product->product_code}}</div>
						<div class="text-info"><h3><strong>{{$product->product_name}}</strong></h3></div>
						
						<div class="product_text">{!!$product->product_details!!}</div>
						<div class="order_info d-flex flex-row">
							
								<div class="clearfix" style="z-index: 1000;">

									<!-- Product Quantity -->
									
										
									

									<!-- Product Color -->
									<ul class="product_color">
                                        <li>
                                            <span>Available Quantity : {{$product->product_quantity}} </span>
										
                                        </li>
										<li>
											<span>Color: {{$product->product_colour}} </span>
											
										</li>
                                        <li>
                                            <div class="product_price">Selling Price : ${{$product->selling_price}}</div>
                                        </li>
                                        <li>
                                            <span>Size: {{$product->product_size}} </span>
                                        </li>
                                        
                                            @if ($product->discount_price)
                                              <li>  <span>Discount Price: {{$product->discount_price}} </span></li>
                                            @endif

                                            <div class="row">

                                           
                                        <div class="col-lg-4">
											<span>Status  @if ($product->status==1)
                                                <span class="badge badge-success"> Active</span>
                                            @else
                                                <span class="badge badge-danger">Inctive</span>
                                            @endif
                                          </span>
											
										</div>
										<div class="col-lg-4">
											<span>Main Slider  @if ($product->main_slider==1)
                                                <span class="badge badge-success"> Active</span>
                                            @else
                                                <span class="badge badge-danger">Inctive</span>
                                            @endif
                                          </span>
											
										</div>
                                        <div class="col-lg-4">
											<span>Mid Slider  @if ($product->mid_slider==1)
                                                <span class="badge badge-success"> Active</span>
                                            @else
                                                <span class="badge badge-danger">Inctive</span>
                                            @endif
                                          </span>
											
										</div>
                                        <div class="col-lg-4">
											<span>Hot Deals  @if ($product->hot_deal==1)
                                                <span class="badge badge-success"> Active</span>
                                            @else
                                                <span class="badge badge-danger">Inctive</span>
                                            @endif
                                          </span>
											
										</div>
                                        <div class="col-lg-4">
											<span>Best Rated  @if ($product->best_rated==1)
                                                <span class="badge badge-success"> Active</span>
                                            @else
                                                <span class="badge badge-danger">Inctive</span>
                                            @endif
                                          </span>
											
										</div>
                                        <div class="col-lg-4">
											<span>Hot New  @if ($product->hot_new==1)
                                                <span class="badge badge-success"> Active</span>
                                            @else
                                                <span class="badge badge-danger">Inctive</span>
                                            @endif
                                          </span>
											
										</div>
                                        <div class="col-lg-4">
											<span>Trending  @if ($product->trend==1)
                                                <span class="badge badge-success"> Active</span>
                                            @else
                                                <span class="badge badge-danger">Inctive</span>
                                            @endif
                                          </span>
											
										</div>
									 </div>
                                        </ul>

								</div>
                                </div>
                                
                                </div>

							
							
								
							
						
					</div>
				</div>

			</div>
		</div>
	</div>
        </div>    
</div>    
</div>
@endsection