<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Question;
use App\Model\QuestionChoices;
use App\User;


class UserQuestionAnswer extends Model
{
    protected $fillable = [
        'id', 'user_id' ,'question_id', 'choise_id' 
    ];


    public function choise()
    {
        return $this->belongsTo(QuestionChoices::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
