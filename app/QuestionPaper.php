<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionPaper extends Model
{
    protected $fillable = [
        'quecategory_id','sem','subject','year','question_paper'
    ];

	function quecat()
	{
		return $this->belongsTo("App\QuestionPaperCategory","quecategory_id","id");
	}
}
