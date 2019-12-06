<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Question;
use App\User;


class QuestionDaily extends Model
{
    protected $fillable = [
        'id', 'question_id', 'user_id'
    ];

    public function question() {
        return $this->belongsTo(Question::class, 'question_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
