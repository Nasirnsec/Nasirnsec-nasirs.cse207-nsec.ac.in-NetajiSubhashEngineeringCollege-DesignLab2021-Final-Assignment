<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'post_id','type','name','email','subject','message'
    ];

	function blog()
	{
		return $this->belongsTo("App\Blog","post_id","id");
	}

	function video()
	{
		return $this->belongsTo("App\Video","post_id","id");
	}

	function ebook()
	{
		return $this->belongsTo("App\Ebook","post_id","id");
	}
}
