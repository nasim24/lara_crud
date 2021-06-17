
            <!-- col-sm-9 -->
            <div class="col-sm-9">
                <div class="row">
                
                    <div class="col-sm-12">                
                    @foreach($key as $row)
                    <h5 class="mt-2 text-info">Welcome, <span class="text-danger" style="font-size:15px;">{{$row['Name']}}</span></h5>
                        <div class="row mt-5">
                            <div class="col-sm-9">                                                            
                                <div class="card">
                                    <div class="card-header">
                                        <p>User Information</p>
                                    </div>
                                    <div class="card-body">
                                        <h5>Name: {{$row['Name']}}</h5>
                                        <h5>Email: {{$row['Email']}}</h5>                      
                                        <h5 class="mt-5">
                                            <a href="#" class="btn btn-info" data-toggle="modal" data-target="#edit_pro">Edit Profile</a>
                                            <a href="{{url('logout')}}" class="offset-sm-2 btn btn-danger">logout</a>
                                        </h5>                                                  
                                    </div>
                                </div>
                              
                            </div>
                            <div class="col-sm-3">
                                @if(session('status'))
                                    <h5 class="alert alert-success">{{session('status')}}</h5>
                                @endif
                                <form action="{{url('fileupload')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                    <img src="<?php echo asset('uploads/'.$row['image'])?>" alt="" width="120px" height="100px">
                                    <input type="file" class="form-control mt-3" name="image">
                                    <input type="submit" name="imgupload" value="change profile" class="mt-3 btn btn-success">
                                </form>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!--end col-9-->
        </div>
    </div>
</div>
​



<!-- edit profile model -->

<div class="modal fade" id="edit_pro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @foreach($key as $row2)
      <div class="modal-body">
          <form action="{{url('edit_profile')}}" method="post">
              @csrf
              <div class="row">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Name: </span>
                    </div>
                    <input type="text" class="form-control"  name="username" value="{{$row2['Name']}}">
                </div>
              </div>
              <div class="row mt-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Email: </span>
                    </div>
                    <input type="text" class="form-control"  name="email" value="{{$row2['Email']}}">
                 </div>
              </div>
              @endforeach
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update Profile</button>
      </div>
      </form>
    </div>
  </div>
</div>


