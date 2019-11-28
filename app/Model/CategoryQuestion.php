<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Question;

class CategoryQuestion extends Model
{
    protected $fillable = [
        'id', 'category'
    ];

    public function question() {
        return $this->hasMany(Question::class);
    }

}
