<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudyClassQuiz extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function hasStudyClass()
    {
        return $this->hasOne(StudyClass::class, 'id', 'study_class_id');
    }

    public function hasQuiz()
    {
        return $this->hasOne(Quiz::class, 'id', 'quiz_id');
    }
}