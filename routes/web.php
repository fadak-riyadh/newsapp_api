<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/categories', function(){
//    // return all Category
//   //return \App\Models\Category::all();
//
//    // return comments for one post
//    //$post = \App\Models\Post::find(250);
//   // return $post->comments;
//
//     //return posts for one user
////    $user = \App\Models\User::find(100);
////    return $user->posts;
//
//    // return all User
////    return \App\Models\User::all();
//
//
//});

Route::get('/', function () {
    return view('welcome');
});
