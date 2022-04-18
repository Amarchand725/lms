<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function hasMaterialDetails()
    {
        return $this->hasMany(MaterialDetail::class, 'material_id', 'id');
    }
    public function hasMaterialDetail()
    {
        return $this->hasOne(MaterialDetail::class, 'material_id', 'id');
    }
    public function hasCreatedBy()
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }
}
