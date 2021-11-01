@extends('admin.admin_layouts')

@section('admin_content')
   
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{route('admin')}}">AMAR Dukan</a>
        <span class="breadcrumb-item active">Product Section</span>
      </nav>

      <div class="sl-pagebody">

    
        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Add new Blog Post
          <a href="{{route('all.post')}}" class="btn btn-success btn-sm pull-right">All Posts</a></h6>
          <p class="mg-b-20 mg-sm-b-30">New Blog post add form.</p>
          <form method="POST" action="{{route('store.blog')}}" enctype="multipart/form-data">
            @csrf
          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Post Title (ENGLISH): <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="post_title_en"  placeholder="Enter Post Title ">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Post Title (Bangla): <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="post_title_bn"  placeholder="Enter Post Title ">
                </div>
              </div><!-- col-4 -->
             
              <!-- col-8 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Post Category (English): <span class="tx-danger">*</span></label>
                  <select class="form-control select2" data-placeholder="Choose Category" name="category_id">
                    @foreach ($category as $item)
                        <option value="{{$item->id}}">{{$item->category_name_en}}/{{$item->category_name_bn}}</option>
                    @endforeach
                   
                    
                  </select>
                </div>
              </div>
              
            
              
               <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Post Details (ENGLISH): <span class="tx-danger">*</span></label>
                  <textarea class="form-control" id="summernote"  name="post_details_en"></textarea>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Post Details (BANGLA): <span class="tx-danger">*</span></label>
                  <textarea class="form-control" id="summernote2"  name="post_details_bn"></textarea>
                </div>
              </div>
             
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Post Image <span class="tx-danger">*</span></label><label class="custom-file">
                  <input type="file" id="file" class="custom-file-input" name="post_image" onchange="readURL(this);">
                  <span class="custom-file-control"></span>
                  <img src="#" id="one" >
                </label>
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

