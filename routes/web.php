<?php

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\BlogController;
use App\Http\Middleware;
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
    return view('blog', ["title" => "Blog", "posts" => Blog::paginate(10)]);
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
Route::middleware('guest')->group(function () {
  Route::get('/login', [LoginController::class, 'index'])->name('login');
  Route::post('/login/submit', [LoginController::class, 'signin'])->name('login.submit');
  
  Route::get('/registration', [RegistrationController::class, 'index'])->name('register');
  Route::post('/registration/submit', [RegistrationController::class, 'signup'])->name('register.submit');
});

Route::middleware('auth')->group(function () {
  Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
  
  Route::get('/Personals/personalPage/{user:username}', [BlogController::class, 'index'])->name('personal.page');
  Route::get('/Personals/createPage', [BlogController::class, 'createView'])->name('create.view');
  Route::post('/Personals/createPage', [BlogController::class, 'createSubmit'])->name('create.submit');
  Route::get('/Personals/editPage', [BlogController::class, 'editView'])->name('edit.view');
  Route::post('/Personals/editPage', [BlogController::class, 'update'])->name('update');
  Route::post('/Personals/delete', [BlogController::class, 'delete'])->name('delete');
});