<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $fillable = [
        'category_id','subcategory_name'
    ];

	function cat()
	{
		return $this->belongsTo("App\Category","category_id","id");
	}
}
