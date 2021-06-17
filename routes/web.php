<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\sfy;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('test');
// });

Route::get('/',[Sfy::class,'index']);
Route::get('login',function(){
    if(Session::has('userid'))
    {
       return redirect('profile');
    }
    else
    {
        return view('header').view('login');
    }
});
Route::post('loginpage',[Sfy::class,'loginpage']);
Route::get('/profile',[Sfy::class,'profile']);
Route::get('logout',[Sfy::class,'logout']);
Route::post('fileupload',[Sfy::class,'fileupload']);
Route::get('/signup',[Sfy::class,'signup']);
Route::post('/signup',[Sfy::class,'get_register']);
Route::get('/vb',[Sfy::class,'vb']);
Route::post('/ad_blog',[Sfy::class,'ad_blog']);
Route::get('blog_edit/{bid}',[Sfy::class,'blog_edit']);
Route::post('/blog_update/{bid}',[Sfy::class,'blog_update']);
Route::get('blog_delete/{bid}',[Sfy::class,'blog_delete']);
Route::get('my_blog',[Sfy::class,'my_blog']);
Route::post('edit_profile',[Sfy::class,'edit_profile']);