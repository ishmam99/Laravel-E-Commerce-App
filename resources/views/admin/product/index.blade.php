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
         <a href="{{route('add.product')}}" class="btn btn-sm btn-warning" style="float: right;" >Add New</a></h6>

          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">ID</th>
                  <th class="wd-15p">Product Code</th>
                  <th class="wd-15p">Product name</th>
                  <th class="wd-15p">Product Image</th>
                  <th class="wd-15p">Category</th>
                  
                  <th class="wd-15p">Brand</th>
                  <th class="wd-15p">Product Quantity</th>
                  <th class="wd-15p">Product Status</th>

                  <th class="wd-20p">Action</th>
                  
                </tr>
              </thead>
              <tbody>
                @foreach ($product as $key=>$row)
                    
             
                <tr>
                  <td>{{$key +1}}</td>
                  <td>{{$row->product_code}}</td>
                   <td>{{$row->product_name}}</td>
                    <td><img src="{{URL::to($row->image_one)}}" height="50px" width="70px"></td>
                   <td>{{$row->category_name}}</td>
                    <td>{{$row->brand_name}}</td>
                     <td>{{$row->product_quantity}}</td>
                      <td>
                        @if ($row->status==1)
                            <span class="badge badge-success">Active</span>
                        @else
                        <span class="badge badge-danger">Inctive</span>
                        @endif  
                    </td>
                  <td>
                      <a href="{{route('product.edit',['id' => $row->id]) }}" class="btn btn-info" title="Edit"><i class="fa fa-edit "></i></a>
                      
                      <a href="{{url('delete/product/'.$row->id)}}" class="btn btn-danger" id="delete" title="Delete"><i class="fa fa-trash"> </i></a>
                      <a href="{{route('product.show',['id' => $row->id]) }}"class="btn btn-secondary" title="View"><i class="fa fa-eye"></i></a>
                      @if ($row->status==1)
                          <a href="{{route('product.inactive',['id' => $row->id]) }}"class="btn btn-warning" title="Inactive"><i class="fa fa-thumbs-down"></i></a>
                      @else
                           <a href="{{route('product.active',['id' => $row->id]) }}"class="btn btn-success" title="Active"> <i class="fa fa-thumbs-up"></i></a>
                      @endif
                      
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
