<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionPaperCategory extends Model
{
    protected $fillable = ['quecategory_name'];


    public function que()
    {
    	return $this->hasMany("App\QuestionPaper");
    }
}
