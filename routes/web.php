<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ["title" => "Home"]);
});
Route::get('/about', function () {
    return view('about', ["title" => "About Me"]);
});
Route::get('/contact', function () {
    return view('contact', ["title" => "Contact Me"]);
});
Route::get('/blog', function ($slug) {
    $post = Post::find($slug);
    return view('blog', ["title" => "Blog"]);
});
Route::get('/post', function () {
    return view('blog', ["title" => "Single Post"]);
});
