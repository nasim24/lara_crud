
<div class="container-fluid">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-6 bg-info pb-5 mx-auto mt-5 text-light">
                    <form action="loginpage" method="post">
                    @csrf
                        <div class="row">
                            <div class="col-sm-12 text-center mb-4">
                                <h3>Member Login here</h3>                                
                            </div>       
                        </div>                  
                                <div class="row">
                                    <div class="col-sm-3">
                                        <lable>Email</lable>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" name="email" class="form-control" placeholder="enter your email">
                                    </div>      
                                    <div class="col-sm-3 mt-5">
                                        <lable>Password</lable>
                                    </div>
                                    <div class="col-sm-9 mt-5">
                                        <input type="text" name="pass" class="form-control" placeholder="enter your password">
                                    </div>                                                                                       
                                </div>
                                <div class="row mb-3">
                                    <input type="submit" class="btn btn-success mx-auto mt-3" value="Login" name="login">                         
                                </div>
                                <label class="offset-sm-3">Don't have an account ?</label> <a href="{{url('signup')}}" class="text-danger">Register here</a> 
                                <div class="mt-2">
                                    @if (Session::has('e'))
                                        <h6 class="text-center text-danger">{{session('e')}}</h6>
                                    @endif
                                </div>

                                
                    </form>
                </div>
            </div>
        </div>
    </div>
