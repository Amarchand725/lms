<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function hasUser()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function hasStudyClass()
    {
        return $this->hasOne(StudyClass::class, 'id', 'study_class_id');
    }
    public function hasAssignedClass()
    {
        return $this->hasOne(AssignedClass::class, 'notify_id', 'id')->where('notify_type', 'assignment');
    }
    public function hasAssignedClasses()
    {
        return $this->hasMany(AssignedClass::class, 'notify_id', 'id')->where('notify_type', 'assignment');
    }
    public function hasCreatedBy()
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }
}
