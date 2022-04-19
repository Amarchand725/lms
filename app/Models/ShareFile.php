<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShareFile extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function hasMaterialFile()
    {
        return $this->hasOne(Material::class, 'id', 'shared_material_id');
    }
    public function hasSharedByUser()
    {
        return $this->hasOne(User::class, 'id', 'shared_by_teacher_id');
    }
    public function hasSharedToUser()
    {
        return $this->hasOne(User::class, 'id', 'shared_to_teacher_id');
    }
    public function hasStudyClass()
    {
        return $this->hasOne(StudyClass::class, 'id', 'study_class_id');
    }
}
