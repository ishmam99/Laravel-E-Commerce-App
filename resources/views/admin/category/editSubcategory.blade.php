@extends('admin.admin_layouts')
@section('admin_content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Edit Sub Category </h5>
         
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          

          <div class="table-wrapper">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{$error}}</li>
                      @endforeach
                    </ul>
                </div>
                  
              @endif
              <form method="POST" action="{{route('update.subcategory',['id'=>$subcategory->id])}}" enctype="multipart/form-data">
                @csrf
              <div class="modal-body pd-20">
               
                  <div class="form-group">
                    <label for="brand">Brand Name</label>
                    <input type="text" class="form-control" placeholder="Sub category Name" value="{{$subcategory->subcategory_name}}" name="subcategory_name">

                  </div>
                  <div class="form-group">
                      <label for="category">Category Name</label>
                      <select name="category_id" class="form-control" id="">
                          @foreach ($category as $row)
                               <option value="{{$row->id}}"
                                <?php if($row->id==$subcategory->category_id){echo "selected";}?>>{{$row->category_name}}</option>
                          @endforeach
                         
                      </select>

                  </div>
           
              </div>
                 </form>
          </div><!-- table-wrapper -->
        </div><!-- card -->

  

      </div><!-- sl-pagebody -->
      <footer class="sl-footer">
        <div class="footer-left">
          <div class="mg-b-2">Copyright &copy; 2017. Starlight. All Rights Reserved.</div>
          <div>Made by ThemePixels.</div>
        </div>
        <div class="footer-right d-flex align-items-center">
          <span class="tx-uppercase mg-r-10">Share:</span>
          <a target="_blank" class="pd-x-5" href="https://www.facebook.com/sharer/sharer.php?u=http%3A//themepixels.me/starlight"><i class="fa fa-facebook tx-20"></i></a>
          <a target="_blank" class="pd-x-5" href="https://twitter.com/home?status=Starlight,%20your%20best%20choice%20for%20premium%20quality%20admin%20template%20from%20Bootstrap.%20Get%20it%20now%20at%20http%3A//themepixels.me/starlight"><i class="fa fa-twitter tx-20"></i></a>
        </div>
      </footer>
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
          <!-- LARGE MODAL -->
       
       



@endsection
