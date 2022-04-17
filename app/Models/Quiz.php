<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function hasAssignedToClasses()
    {
        return $this->hasMany(StudyClassQuiz::class, 'quiz_id', 'id');
    }
}
