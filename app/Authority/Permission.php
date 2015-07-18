<?php namespace App\Authority;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
	 public function user()
    {
        return $this->belongsTo('App\User');
    }
}
