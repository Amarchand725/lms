<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectOverview extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function hasSubject()
    {
        return $this->hasOne(Subject::class, 'id', 'subject_id');
    }

    public function hasCreatedBy()
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }
}
