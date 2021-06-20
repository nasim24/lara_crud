
<div class="container">
		<form class="form-group" action="{{url('signup')}}" method="POST">	
        @csrf		
             <div class="col-sm-6 card offset-sm-3  ">
             <div class="col-sm-12 offset-sm-3">
				<h1>Sign up</h1>				
			</div>
             <div class="col-sm-2 mt-2">
				<label>Name</label>				
			</div>
			<div class="col-sm-10 form-group mt-2">
				<input type="text" name="name" class="form-control">
			</div>	
			<div class="col-sm-2">
				<label>Email</label>				
			</div>
			<div class="col-sm-10 form-group">
				<input type="text" name="email" class="form-control">
			</div>	
			<div class="col-sm-2">
				<label>Password</label>				
			</div>
			<div class="col-sm-10 form-group">
				<input type="text" name="password" class="form-control">
			</div>	
				
			<div class="col-sm-3 mt-2 offset-sm-4">
				<input type="submit" name="reg" value="Sign Up" class="form-control btn btn-success">
			</div>		
			<div class="col-sm-12 mt-2 offset-sm-2 mb-2">
				<label>Have already an account ?</label> <a href="{{url('login')}}" class="">Login here</a> 
			</div>
			            
                 @if(session('msg'))
                 <p class="text-center alert alert-danger">{{session('msg')}}</p>
                 @endif
            
             </div>
					
		</form>		
	</div>
    </div>
