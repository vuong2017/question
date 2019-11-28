<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Question;

class QuestionChoices extends Model
{
    protected $fillable = [
        'id', 'question_id', 'is_correct' , 'choices'
    ];
    
    public function question()
    {
        return $this->belongsTo(Question::class);
    }

}
