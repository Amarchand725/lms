<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function hasQuiz()
    {
        return $this->hasOne(Quiz::class, 'id', 'quiz_id');
    }

    public function hasQuestionType()
    {
        return $this->hasOne(QuestionType::class, 'id', 'question_type_id');
    }
    public function hasOptions()
    {
        return $this->hasMany(Option::class, 'question_id', 'id');
    }
}
