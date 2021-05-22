<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ebook extends Model
{
    protected $fillable = [
        'ebookcategory_id','title','author','pages','published_on','description','uploaded_by','picture','ebook','status','like','dislike'
    ];

	function ebookcat()
	{
		return $this->belongsTo("App\EbookCategory","ebookcategory_id","id");
	}

}
