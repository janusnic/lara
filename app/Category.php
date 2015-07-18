<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    //
    public function posts()
	{
		return $this->belongsToMany('App\Post')->withTimestamps();
	}
	public function setNameAttribute($value)
	  {
	    $this->attributes['name'] = $value;

	    if (! $this->exists) {
	      $this->attributes['slug'] = Str::slug($value);
	    }
	  }
}
