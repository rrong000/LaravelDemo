<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InspiringController;
use App\Http\Controllers\PostController;
use App\Models\Post;
use App\Models\Subject;
use Illuminate\Support\Facades\Auth;


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

Route::get('/', function () {
    return view('posts.index',['posts' => Post::cursor()]);
});
// Route::get('/hello-world', function () {
//     return view('hello_world');
// });
// Route::get('/about_us', function () {
//     return view('about_us', ['name' => 'Laravel 6.0 範例']);
// });
// Route::get('/inspire', 'App\Http\Controllers\InspiringController@inspire');

// Route::get('/test', function(){
//     return App\Models\Post::all();
// });
// Route::get('/edit', function(){
//     $post = App\Models\Post::find(1);
//     $post->content = 'Laravel demo';
//     $post->save();
//     return $post;
// });
// Route::get('/add1', function(){
//     $post = new App\Models\Post;
//     $post->subject_id=1;
//     $post->user_id=1;
//     $post->content = 'UUUUUU';
//     $post->save();
//     return $post;
// });
// Route::get('/add2', function(){
//     $post = new App\Models\Post;
//     $post->subject_id=2;
//     $post->user_id=1;
//     $post->content = 'JIEUN';
//     $post->save();
//     return $post;
// });
// Route::get('/sub1', function(){

//     $post = new App\Models\Subject;
//      $post->name = '電腦';
//      $post->save();
//      return $post;
//  });
//  Route::get('/sub2', function(){
//     $post = new App\Models\Subject;
//      $post->name = 'network';
//      $post->save();
//      return $post;
//  });
//  Route::get('/get1', function(){
//     $subject = Subject::find(1);
//     $posts = $subject->posts;
//     return $posts;
// });

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/test', function(){

    Illuminate\Support\Facades\Log::info('觸發 Test');

});
Route::get('/test', function(){

    $subject = Subject::find(Auth::id());

    $posts = $subject->posts;

    return $posts;

});
Route::resource('posts', 'App\Http\Controllers\PostController');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
