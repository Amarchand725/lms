<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignClass extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function hasStudyClass()
    {
        return $this->hasOne(StudyClass::class, 'id', 'study_class_id');
    }
    public function hasSubject()
    {
        return $this->hasOne(Subject::class, 'id', 'subject_id');
    }
}
