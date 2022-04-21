<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Backpack extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function hasMaterialFile()
    {
        return $this->hasOne(Material::class, 'id', 'material_id');
    }
    public function hasUser()
    {
        return $this->hasOne(User::class, 'id', 'by_teacher_id');
    }
}
