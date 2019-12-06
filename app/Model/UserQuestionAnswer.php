<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Question;
use App\Model\QuestionChoices;
use App\User;


class UserQuestionAnswer extends Model
{
    protected $fillable = [
        'id', 'user_id' ,'question_id', 'choices_id' 
    ];


    public function choice()
    {
        return $this->belongsTo(QuestionChoices::class, 'choices_id');
    }

    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
