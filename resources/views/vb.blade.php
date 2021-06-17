<div class="col-sm-9">
<h4 class="mb-4">All Blog details</h4>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Add Blog
</button>

@if(session('status'))
<p class="text-center alert alert-success">{{session('status')}}</p>
@endif

<table class="table mt-4">
    <thead class="thead-dark">
      <tr>
        <th><input type="checkbox"></th>
        <th>Blog Title</th>
        <th>Description</th>
        <th>Action</th>
      </tr>
    </thead>

    @foreach($data as $row)
    <tbody>
      <tr>
        <td><input type="checkbox" value={{$row->bid}}></td>
        <td>{{$row['title']}}</td>
        <td>{{substr($row->description,0,100)}}</td>
        <td>
          <a href="blog_edit/{{$row['id']}}" class=""><img src="https://cdn3.iconfinder.com/data/icons/social-messaging-ui-color-line/254000/168-512.png" alt="" width="20px"></a>
          <a href="blog_delete/{{$row['id']}}" class=""><img src="https://freepikpsd.com/media/2019/10/delete-icon-png-red-5-Transparent-Images.png" alt="" width="20px"></a>
        </td>
        
      </tr>
    </tbody>
    @endforeach
  </table>
</div>

</div>
</div> <!--end container  -->

<!-- ad blog modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="{{url('ad_blog')}}" method="post">
              @csrf
              <div class="row">
                  <div class="col-sm-3">
                    <label for="">Blog Title</label>
                  </div>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="title">
                  </div>
              </div>
              <div class="row mt-3">
                  <div class="col-sm-3">
                    <label for="">Blog Description</label>
                  </div>
                  <div class="col-sm-8">
                    <!-- <input type="text" class="form-control"> -->
                    <textarea name="desc" id="" cols="20" rows="5" class="form-control"></textarea>
                  </div>
              </div>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Post Blog</button>
      </div>
      </form>
    </div>
  </div>
</div>