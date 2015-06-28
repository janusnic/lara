<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    //
  protected $softDelete = true;

  protected $guarded = array();  // Important
  //protected $fillable = ['title', 'content'];
 //  protected $guarded = ['id'];
  //protected $table = 'posts';
  protected $dates = ['published_at'];

  public function getPublishedPosts()
  {
        $posts = Post::where('published_at', '<=', Carbon::now())
           ->orderBy('published_at', 'desc')
           ->paginate(config('blog.posts_per_page'));

    return $posts;
  }

  public function scopePublished($query)
  {
    $query->where('published_at','<=',Carbon::now());
  }
  public function scopeUnpublished($query)
  {
    $query->where('published_at','>=',Carbon::now());
  }

  public function setPublishedAtAttribute($date)
  {
   // $this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d',$date);
     $this->attributes['published_at'] = Carbon::parse($date);
  }

  public function setTitleAttribute($value)
  {
    $this->attributes['title'] = $value;

    if (! $this->exists) {
      $this->attributes['slug'] = Str::slug($value);
    }
  }
}
