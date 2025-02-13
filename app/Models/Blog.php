<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\User;

class Blog extends Model
{
  use HasFactory;
  protected $fillable = ['title','author','slug','body','category_id','author_id'];
  protected $with = ['author','category'];
  
  public function author(): BelongsTo 
  {
    return $this->belongsTo(User::class);
  }
  public function category(): BelongsTo 
  {
    return $this->belongsTo(Category::class);
  }
}
