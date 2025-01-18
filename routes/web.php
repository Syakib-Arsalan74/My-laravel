<?php

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
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
    return view('blog', ["title" => "Blog", "posts" => Blog::all()]);
});
Route::get('/blog/{post:slug}', function (Blog $post) {
    return view('post', ["title" => "Single Post", "post" => $post]);
});
Route::get('/authors/{user}', function (User $user) {
    return view('blog', ["title" => count($user->blogs) . " Article by " . $user->name, "posts" => $user->blogs]);
});
Route::get('/categories/{category:slug}', function (Category $category) {
    return view('blog', ["title" => "Article in " . $category->name, "posts" => $category->blogs]);
});