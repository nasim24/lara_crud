<?php

namespace App\Http\Controllers;
use Session;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB; {Database Connectivity withoud using model}
use App\Models\User;
use App\Models\Blog;
use DB;
class Sfy extends Controller
{
    public function index()
    {
        return view('header').view('login');
    }
    
    // login page 
    public function loginpage(Request $req)
    {
       $email=$req->input('email');
       $password=$req->input('pass');
        
       if(!empty($email)  && !empty($password))
       {
            $users= DB::select("select * from users where email='$email'");
            
            foreach($users as $user)
            {                
                $e= $user->Email; 
                $uid=$user->id;
                $role=$user->role;
                $req->session()->put('userid',$uid);
                $req->session()->put('role',$role);
            }
        
            if($e==$email)
            {
                // $users_pwd= DB::table('users')->get();
                $users_pwd = DB::select("select * from users where password='$password' and email='$email'");
                foreach($users_pwd as $row)
                {
                    $pwd=$row->Password;                                        
                }
                if($pwd==$password)
                {          
                             
                    return redirect('profile');
                }
                else
                {
                    $req->session()->flash('e','Wrong Password');
                    return redirect('login');
                }
            }
            else
            {
                $req->session()->flash('e','Wrong Email');
                return redirect('login');
            }
       }
       else
       {
          $req->session()->flash('e','All field are mandatory');
          return redirect('login');
       }
    }

    // Profile page 
    public function profile(Request $req)
    {
        $role=session('role');
        $uid=session('userid');
        $user =  User::select("*")
        ->where('id',$uid)
        ->get();
        if($role=='admin')
        {
            return view('header').view('admindash').view('profile',["key"=>$user]);
        }
        else
        {
            return view('header').view('userdash').view('profile',["key"=>$user]);
        }
       
       
    }

    // edit profile

    public function edit_profile(Request $req)
    {
        $uid = session('userid');
        $user = User::find($uid);        
        $user->Name=$req->input('username');
        $user->Email=$req->input('email');
        $user->save();
        return redirect('profile');
    }

public function logout(Request $req)
{
    Session::flush();
    return   redirect('/');
}

// image upload

public function fileupload(Request $req)
{
        $fileModel = new User; 
        $uid=session('userid');
        if($req->hasfile('image'))                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        
        {
            $file = $req->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename= time().'.'.$ext;
            $file->move('uploads',$filename);
            $fileModel->image = $filename;            
        }
         DB::table('users')
                    ->where('id',$uid )
                    ->update(array('image'=>$filename));
        return redirect()->back()->with('status','Image updated...');
}

    // register page 
    public function signup()
    {
        return view('header').view('signup');
    }

    public function get_register(Request $req)
    {
        $user = new User;
        $username=$user->name=$req->input('name');
        $email=$user->email=$req->input('email');
        $pass=$user->password=$req->input('password');
        if(!empty($username) && !empty($email) && !empty($pass))
        {
            $userdata = User::all();
            foreach($userdata as $row)
            {
                $e=$row['Email'];
            }
            if($e==$email)
            {
                $req->session()->flash('msg','this email is already register with our db try other');
                return redirect('signup');
            }
            else
            {
                $user->save();
                $req->session()->flash('msg','Your are successfully register');
                return redirect('signup');
            }
        }
        else
        {
            $req->session()->flash('msg','All feild are mandatory');
            return redirect('signup');
        }
        
    }


    // view blog
    public function vb()
    {
        $blog = Blog::all();
        $role=session('role');
        if($role=='admin')
        {            
            return view('header').view('admindash').view('vb',["data"=>$blog]);
        }
        else
        {
            return view('header').view('userdash').view('vb',["data"=>$blog]);
        }
    }

    public function my_blog()
    {
        $uid = session('userid');
        $blog = Blog::where('uid',$uid)->get();
        $role=session('role');
        if($role=='admin')
        {            
            return view('header').view('admindash').view('vb',["data"=>$blog]);
        }
        else
        {
            return view('header').view('userdash').view('vb',["data"=>$blog]);
        }
    }

    // add blog

    public function ad_blog(Request $request)
    {
         $uid=session('userid');
         $blog = new Blog;
         $blog->uid=$uid;
         $title = $blog->title=$request->input('title');
         $desc = $blog->description=$request->input('desc');
         if(!empty($title) && !empty($desc))
         {
            $blog->save();
            $request->session()->flash('status','Your post has been successfully published..');
            return redirect('/vb');
         }
    }

    // blog edit

    public function blog_edit(Request $req, $bid)
    {
        $blog = Blog::where('id',$bid)->get();
        $role=session('role');
        if($role=='admin')
        {            
            return view('header').view('admindash').view('edit_blog',["data"=>$blog]);
        }
        else
        {
            return view('header').view('userdash').view('edit_blog',["data"=>$blog]);
        }
        // return view('header').view('headerdash').view('edit_blog',['data'=>$blog]);
    }

    public function blog_update(Request $req,$bid)
    {
        $blog= Blog::find($bid);        
        $uid=session('userid');
        $blog->title=$req->input('title');
        $blog->description=$req->input('desc');
        $blog->uid=$uid;
        $blog->save();
        return redirect('vb')->with('status','Blog has been updated.....');             
    }

    public function blog_delete(Request $req,$bid)
    {
        $blog= Blog::find($bid);        
        $blog->delete();
        return redirect('vb')->with('status','Blog has been deleted.....');        
    }

}
