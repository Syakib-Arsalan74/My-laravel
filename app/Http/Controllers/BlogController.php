<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Blog;
use App\Models\Category;

class BlogController extends Controller
{
  public function index (User $user) {
    return view('Personals.personalPage',
    ['title' => $user->username, 'blogs' => Blog::where('author_id', auth()->user()->id)->get()]);
  }
  public function createView () {
    return view('Personals.createPage', 
    [
      'title' => 'Posting Your Blog',
      'categories' => Category::all()
    ]);
  }
  public function createSubmit (Request $request) {
    $validateData = $request->validate([
      'title' => 'required|max:255',
      'slug' => 'required|unique:blogs',
      'category_id' => 'required',
      'body' => 'required'
      ]);
    $validateData['author_id'] = auth()->user()->id;
    Blog::create($validateData);
    return redirect()->route('personal.page',  ['user' => Auth::user()->username]);
  }
  public function editView ($slug) {
    $blog = Blog::where('slug', $slug)->first();
    return view('Personals.editPage',
    [
      'title' => 'Edit your Blog',
      'blog' => $blog,
      'categories' => Category::all()
    ]);
  }
  public function update(Request $request, $slug) {
    $blog = Blog::where('slug', $slug)->firstOrFail();

    $validateData = $request->validate([
        'title' => 'required|max:255',
        'slug' => 'required|unique:blogs,slug,' . $blog->id,
        'category_id' => 'required|exists:categories,id',
        'body' => 'required'
    ]);

    $blog->update($validateData);

    return redirect()->route('personal.page', ['user' => Auth::user()->username])->with('success', 'Blog post updated successfully.');
  }
  public function destroy (Blog $blog) {
    $blog->delete();
    return redirect()->route('personal.page',  ['user' => Auth::user()->username]);
  }
}
