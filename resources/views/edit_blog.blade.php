<div class="col-sm-9">                                                            
     <div class="card">
         <div class="card-header">
             <p>Edit blog</p>
         </div>
         <div class="card-body">
         @foreach($data as $row)
           <form action="{{url('blog_update')}}/{{$row['id']}}" method="post">
           @csrf
            <div class="row">
                <div class="col-sm-2 mt-2">
                    <label>Title</label>				
                </div>
                <div class="col-sm-10 form-group mt-2">
                    <input type="text" name="title" class="form-control" value="{{$row['title']}}">
                </div>	
            </div>      
            <div class="row">
                <div class="col-sm-2 mt-2">
                    <label>Description</label>				
                </div>
                <div class="col-sm-10 form-group mt-2">
                    <textarea name="desc" id="" cols="30" rows="5" class="form-control">{{$row['description']}}</textarea>
                </div>	
            </div>                   
            <div class="col-sm-12 text-center"> 
                <input type="submit" value="update blog" class="btn btn-info">
            </div>
            @endforeach
            </form>
             </div>
         </div>
     </div>