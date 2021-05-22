<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EbookCategory extends Model
{
    protected $fillable = ['ebookcategory_name'];


    public function ebook()
    {
    	return $this->hasMany("App\Ebook");
    }
}
