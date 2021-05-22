<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'category_id','subcategory_id','title','content','like','dislike','tags','uploaded_by','picture','status'
    ];

	function cat()
	{
		return $this->belongsTo("App\Category","category_id","id");
	}

	function subcat()
	{
		return $this->belongsTo("App\Subcategory","subcategory_id","id");
	}
}
