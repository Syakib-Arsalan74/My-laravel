<?php

use App\Models\Blog;
use Illuminate\Support\Arr;
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
Route::get('/blog', function () {
    return view('blog', ["title" => "Blog", "blogs" => Blog::all()]);
});
Route::get('/post/{slug}', function ($slug) {
    $post = Blog::find($slug);
    return view('blog', ["title" => "Single Post", "post" => $post]);
});
