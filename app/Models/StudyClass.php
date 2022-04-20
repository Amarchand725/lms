<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudyClass extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function teacherHasAssignedClass()
    {
        return $this->hasOne(AssignClass::class, 'study_class_id', 'id');
    }
}
