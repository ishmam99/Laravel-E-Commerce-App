@extends('admin.admin_layouts')

@section('admin_content')
   @php
       $category=DB::table('categories')->get();
        $subcategory=DB::table('subcategories')->get();
         $brand=DB::table('brands')->get();
   @endphp
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{route('admin')}}">AMAR Dukan</a>
        <span class="breadcrumb-item active">Update Product Section</span>
      </nav>

      <div class="sl-pagebody">

    
        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Update Product</h6>
          
          <form method="POST" action="{{route('update.product',['id' => $product->id])}}" enctype="multipart/form-data">
            @csrf
          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_name"  value="{{$product->product_name}}">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_code"  value="{{$product->product_code}}">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Quantity: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_quantity" value="{{$product->product_quantity}}">
                </div>
              </div>
              <!-- col-8 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" data-placeholder="Choose Category" name="category_id">
                    @foreach ($category as $item)
                        <option value="{{$item->id}}"<?php if ($product->category_id==$item->id) {
                            echo "Selected"; } ?> >{{$item->category_name}}</option>
                    @endforeach
                   
                    
                  </select>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Sub Category: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" data-placeholder="Choose Sub Category" name="subcategory_id">
                    @foreach ($subcategory as $item)
                        <option value="{{$item->id}}"<?php if ($product->subcategory_id==$item->id) {
                            echo "Selected"; } ?> >{{$item->subcategory_name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Brand: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" data-placeholder="Choose Brand" name="brand_id">
                   @foreach ($brand as $item)
                        <option value="{{$item->id}}"<?php if ($product->brand_id==$item->id) {
                            echo "Selected"; } ?> >{{$item->brand_name}}</option>
                    @endforeach
                    
                  </select>
                </div>
              </div><!-- col-4 -->
            <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Size: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_size" data-role="tagsinput" value="{{$product->product_size}}" id="size">
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Colour: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_colour" data-role="tagsinput" value="{{$product->product_colour}}" id="colour">
                </div>
              </div>
               <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Selling Price: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="selling_price" value="{{$product->selling_price}}">
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Discount Price: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="discount_price" @if ($product->discount_price)
                      value="{{$product->discount_price}}
                  @endif ">
                </div>
              </div>
               <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Product Details: <span class="tx-danger">*</span></label>
                  <textarea class="form-control" id="summernote"  name="product_details">{{$product->product_details}}</textarea>
                </div>
              </div>
              <div class="col-lg-10">
                <div class="form-group">
                  <label class="form-control-label">Video Link: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="video_link" value="{{$product->video_link}}">
                </div>
              </div>
             
              
            </div>
            </div><!-- row -->
            <hr>
            <br>
            <br>
            <div class="row">
              <div class="col-lg-4">
                <label class="ckbox">
                  <input type="checkbox" name="main_slider" value="1" <?php if ($product->main_slider==1) {echo "checked";} ?>>
                  <span>Main Slider</span>
                </label>

              </div>
              <div class="col-lg-4">
                <label class="ckbox">
                  <input type="checkbox" name="hot_deal" value="1"<?php if ($product->hot_deal==1) {echo "checked";} ?>>
                  <span>Hot Deals</span>
                </label>

              </div>
              <div class="col-lg-4">
                <label class="ckbox">
                  <input type="checkbox" name="best_rated" value="1" <?php if ($product->best_rated==1) {echo "checked";} ?>>
                  <span>Best Rated</span>
                </label>

              </div>
              <div class="col-lg-4">
                <label class="ckbox">
                  <input type="checkbox" name="trend" value="1" <?php if ($product->trend==1) {echo "checked";} ?>>
                  <span>Trend Product</span>
                </label>

              </div>
              <div class="col-lg-4">
                <label class="ckbox">
                  <input type="checkbox" name="mid_slider" value="1" <?php if ($product->mid_slider==1) {echo "checked";} ?>>
                  <span>Mid Slider</span>
                </label>

              </div>
              <div class="col-lg-4">
                <label class="ckbox">
                  <input type="checkbox" name="hot_new" value="1" <?php if ($product->hot_new==1) {echo "checked";} ?>>
                  <span>Hot New</span>
                </label>

              </div>

            </div>

            <br><br>
            <div class="form-layout-footer">
              <button class="btn btn-info mg-r-5">Submit Form</button>
              <button class="btn btn-secondary">Cancel</button>
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
          </form>
        </div><!-- card -->

        
        </div><!-- row -->

 
    </div>
        <div class="sl-mainpanel">
      

      <div class="sl-pagebody">

    
        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Update Product Photo</h6>
          
          <form method="POST" action="{{route('update.productphoto',['id' => $product->id])}}" enctype="multipart/form-data">
            @csrf
              <div class="row">
               <div class="col-lg-6 col-sm-6">
                
                  <label class="form-control-label">Product Images One : <span class="tx-danger">*</span></label><label class="custom-file">
                 <input type="file" id="file" class="custom-file-input" name="image_one" onchange="readURL(this);">
                  <span class="custom-file-control"></span></label>
                  <input type="hidden" name="old_img_one"  value="{{$product->image_one}}"><img src="#" id="one" alt="">
                </div>  <div class="col-lg-6 col-sm-6">
                    <img src="{{URL::to($product->image_one)}}" class="rounded mx-auto d-block" alt="Responsive image" width="100" height="100">
</div>
                </div>
               
               <div class="row">
               <div class="col-lg-6 col-sm-6">
                
                  <label class="form-control-label">Product Images Two : <span class="tx-danger">*</span></label><label class="custom-file">
                 <input type="file" id="file" class="custom-file-input" name="image_two" onchange="readURL2(this);">
                  <span class="custom-file-control"></span></label>
                  <input type="hidden" name="old_img_two"  value="{{$product->image_two}}"><img src="#" id="two" alt="">
                </div> <br> <div class="col-lg-6 col-sm-6">
                    <img src="{{URL::to($product->image_two)}}" class="rounded mx-auto d-block" alt="Responsive image" width="100" height="100">

                </div>
               
              </div> <div class="row">
               <div class="col-lg-6 col-sm-6">
               
                  <label class="form-control-label">Product Images Three : <span class="tx-danger">*</span></label><label class="custom-file">
                  <input type="file" id="file" class="custom-file-input" name="image_three" onchange="readURL3(this);">
                  <span class="custom-file-control"></span></label>
                  <input type="hidden" name="old_img_three"  value="{{$product->image_three}}"><img src="#" id="three" alt="">
                </div> <div class="col-lg-6 col-sm-6">
                    <img src="{{URL::to($product->image_three)}}" class="rounded mx-auto d-block" alt="Responsive image" width="100" height="100">

                </div>
                
              </div>
            <div class="form-layout-footer">
              <button class="btn btn-info mg-r-5">Submit Form</button>
              <button class="btn btn-secondary">Cancel</button>
            </div><!-- form-layout-footer -->
          <!-- form-layout -->
          </form>
        </div><!-- card -->

        </div>
        </div><!-- row -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
    <script>
      $(document).ready(function(){
        $('select[name="category_id"]').on('change',function(){
          var category_id = $(this).val();
          if(category_id)
          {
            $.ajax({
              url:"{{url('/get/subcategory/')}}/"+category_id,
              type:"GET",
              dataType:"json",
              success:function(data){
                var d=$('select[name="subcategory_id"]').empty();
                $.each(data, function(key, value){
                  $('select[name="subcategory_id"]').append('<option value="'+value.id+'">'+value.subcategory_name+'</option>');
                });
              },
            });
          }else{
            alert('danger');
          }
        });
      });
    </script>

    <script>
      function readURL(input){
        if(input.files && input.files[0]){
          var reader = new FileReader();
          reader.onload= function(e){
            $('#one')
            .attr('src',e.target.result)
            .width(100)
            .height(100);
          };
          reader.readAsDataURL(input.files[0]);
        }
    
      }
    </script> 
    <script>
      function readURL2(input){
        if(input.files && input.files[0]){
          var reader = new FileReader();
          reader.onload= function(e){
            $('#two')
            .attr('src',e.target.result)
            .width(100)
            .height(100);
          };
          reader.readAsDataURL(input.files[0]);
        }
      }
    </script>
     <script>
      function readURL3(input){
        if(input.files && input.files[0]){
          var reader = new FileReader();
          reader.onload= function(e){
            $('#three')
            .attr('src',e.target.result)
            .width(100)
            .height(100);
          };
          reader.readAsDataURL(input.files[0]);
        }
      }
    </script>





@endsection

