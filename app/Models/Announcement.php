<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function hasStudyClass()
    {
        return $this->hasOne(StudyClass::class, 'id', 'study_class_id');
    }
    public function hasCreatedBy()
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }
    public function hasAssignedClass()
    {
        return $this->hasOne(AssignedClass::class, 'notify_id', 'id')->where('notify_type', 'announcement');
    }
    public function hasAssignedClasses()
    {
        return $this->hasMany(AssignedClass::class, 'notify_id', 'id')->where('notify_type', 'announcement');
    }
}
