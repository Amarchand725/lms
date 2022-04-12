<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function hasStudyClass()
    {
        return $this->hasOne(StudyClass::class, 'id', 'study_class_id');
    }
    public function hasUser()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
