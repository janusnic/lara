<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    //
  protected $softDelete = true;

  protected $guarded = array();  // Important
  protected $table = 'posts';
  protected $dates = ['published_at'];

    public function setTitleAttribute($value)
  {
    $this->attributes['title'] = $value;

    if (! $this->exists) {
      $this->attributes['slug'] = Str::slug($value);
    }
  }
}
