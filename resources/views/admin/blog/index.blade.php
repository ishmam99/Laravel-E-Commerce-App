@extends('admin.admin_layouts')
@section('admin_content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Product Table</h5>
         
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Product List
         <a href="{{route('add.blog.post')}}" class="btn btn-sm btn-warning" style="float: right;" >Add New</a></h6>

          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">ID</th>
                  <th class="wd-15p">Post Title (ENGLISH)</th>
                  <th class="wd-15p">Post Title (BANGLA)</th>
                 <th class="wd-15p">Category</th>
                  <th class="wd-15p">Post Image</th>
                  <th class="wd-20p">Action</th>
                  
                </tr>
              </thead>
              <tbody>
                @foreach ($post as $key=>$row)
                    
             
                <tr>
                  <td>{{$key +1}}</td>
                  <td>{{$row->post_title_en}}</td>
                 <td>{{$row->post_title_bn}}</td>
                   
                   <td>{{$row->category_name_en}}/{{$row->category_name_bn}}</td>
                    <td>
                        @if ($row->post_image)
                        <img src="{{URL::to($row->post_image)}}" height="50px" width="70px">
                    @else
                        No Image
                    @endif
                </td>
                      
                  <td>
                      <a href="{{route('post.edit',['id' => $row->id]) }}" class="btn btn-info" title="Edit"><i class="fa fa-edit "></i></a>
                      
                      <a href="{{url('delete/post/'.$row->id)}}" class="btn btn-danger" id="delete" title="Delete"><i class="fa fa-trash"> </i></a>
                      <a href="{{route('post.show',['id' => $row->id]) }}"class="btn btn-secondary" title="View"><i class="fa fa-eye"></i></a>
                     
                      
                  </td> 
                  
                </tr>   @endforeach
              </tbody>
            </table>
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
        


@endsection
