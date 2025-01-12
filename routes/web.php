<?php

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
    return view('blog', ["title" => "Blog"]);
});
