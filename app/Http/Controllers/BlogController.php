<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Blog;

class BlogController extends Controller
{
  public function index (User $user) {
    return view('Personals.personalPage',
    ['title' => $user->username]);
  }
  public function createView () {
    return view('Personals.createPage', 
    ['title' => 'Posting Your Blog']);
  }
  public function createSubmit (Request $request) {
    $post = new Blog();
    $post = $request->validate([
      'title' => 'required|max:255',
      'slug' => 'required|unique:posts',
      'category_id' => 'required',
      'author_id' => 'required',
      'body' => 'required'
      ]);
    $post->save();
    return redirect()->route('personal.page');
  }
  public function editView ($slug) {
    $post = Blog::find($slug);
    return view('Personals.editPage');
  }
  public function update (Request $request, $slug) {
    $post = Blog::find($slugf);
    
    $post->update();
    return redirect()->route('personal.page');
  }
  public function delete ($slug) {
    $post = Blog::find($slug);
    $post->delete();
    return redirect()->route('personal.page');
  }
}
