<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\CategoryQuestion;
use App\Model\QuestionChoices;


class Question extends Model
{

    protected $attributes = [
        'is_active' => true
    ];

    protected $fillable = [
        'id', 'category_question_id', 'question', 'is_active'
    ];

    public function category() {
        return $this->belongsTo(CategoryQuestion::class, 'category_question_id');
    }

    public function choices() {
        return $this->hasMany(QuestionChoices::class);
    }
}
