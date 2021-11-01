@extends('admin.admin_layouts')

@section('admin_content')
   @php
       $category=DB::table('post_category')->get();
   @endphp
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{route('admin')}}">AMAR Dukan</a>
        <span class="breadcrumb-item active">Post Update Section</span>
      </nav>

      <div class="sl-pagebody">

    
        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Update Blog Post
          <a href="{{route('all.post')}}" class="btn btn-success btn-sm pull-right">All Posts</a></h6>
          <p class="mg-b-20 mg-sm-b-30">New Blog post add form.</p>
          <form method="POST" action="{{route('update.blog',['id'=>$post->id])}}" enctype="multipart/form-data">
            @csrf
          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Post Title (ENGLISH): <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="post_title_en"  value="{{$post->post_title_en}}">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Post Title (Bangla): <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="post_title_bn"   value="{{$post->post_title_bn}}">
                </div>
              </div><!-- col-4 -->
             
              <!-- col-8 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Post Category (English): <span class="tx-danger">*</span></label>
                  <select class="form-control select2" data-placeholder="Choose Category" name="category_id">
                    @foreach ($category as $item)
                        <option value="{{$item->id}}" @php
                            if($post->category_id==$item->id)
                            echo "Selected"
                        @endphp>{{$item->category_name_en}}/{{$item->category_name_bn}}</option>
                    @endforeach
                   
                    
                  </select>
                </div>
              </div>
              
            
              
               <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Post Details (ENGLISH): <span class="tx-danger">*</span></label>
                  <textarea class="form-control" id="summernote"  name="post_details_en">{{$post->details_en}} </textarea>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Post Details (BANGLA): <span class="tx-danger">*</span></label>
                  <textarea class="form-control" id="summernote2"  name="post_details_bn">{{$post->details_bn}}</textarea>
                </div>
              </div>
             
              <div class="row">
               <div class="col-lg-6 col-sm-6">
                
                  <label class="form-control-label">Product Images One : <span class="tx-danger">*</span></label><label class="custom-file">
                 <input type="file" id="file" class="custom-file-input" name="post_image" onchange="readURL(this);">
                  <span class="custom-file-control"></span></label>
                  <input type="hidden" name="old_img"  value="{{$post->post_image}}"><img src="#" id="one" alt="">
                </div>  <div class="col-lg-6 col-sm-6">
                    <img src="{{URL::to($post->post_image)}}" class="rounded mx-auto d-block" alt="Responsive image" width="100" height="100">
</div>
                </div>
               
               
            </div>
            </div><!-- row -->
            

           

            <br><br>
            <div class="form-layout-footer">
              <button class="btn btn-info mg-r-5">Submit Form</button>
             
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
          </form>
        </div><!-- card -->

        
        </div><!-- row -->

 
    </div>
  

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
    




@endsection
