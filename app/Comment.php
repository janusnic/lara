<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
 //comments table in database
	protected $guarded = [];
	
	// user who commented
	public function author()
	{
		return $this->belongsTo('App\User','from_user');
	}
	
	public function post()
	{
		return $this->belongsTo('App\Post','on_post');
	}

}
