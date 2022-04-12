<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function hasUser()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function hasDepartment()
    {
        return $this->hasOne(Department::class, 'id', 'department_id');
    }
}
