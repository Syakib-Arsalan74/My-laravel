<?php
namespace App\Models;

use Illuminate\Support\Arr;

class Post {
  public static function allPost(){
    return
  }
  public static function find($slug): array{
    $post = Arr::first(static::allPost(), function ($post) use ($slug){
      return $post["slug"] == $slug;
    });
    if (!$post) {
      abort(404);
    }
    return $post;
  }
}