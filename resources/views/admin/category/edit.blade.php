@extends('admin.admin_layouts')
@section('admin_content')
 <div class="sl-mainpanel">
      

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Edit Category </h5>
         
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Category
         <a href="#" class="btn btn-sm btn-warning" style="float: right;" data-toggle="modal" data-target="#modaldemo3">Add New</a></h6>

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
              <form method="POST" action="{{route('update.category',['id' => $category->id])}}">
                @csrf
              <div class="modal-body pd-20">
               
                  <div class="form-group">
                    <label for="category">Category Name</label>
                    <input type="text" class="form-control" value="{{$category->category_name}}" placeholder="Category Name" name="category_name" required>

                 
                  </div>
           
              </div><!-- modal-body -->
              <div class="modal-footer">
                <button type="submit" class="btn btn-info pd-x-20">Update</button>
                
            </div>
                 </form>
          </div><!-- modal-dialog -->
        </div><!-- modal -->

  

      </div>
 </div>
@endsection
 