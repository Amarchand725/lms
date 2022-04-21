<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the path to the profile picture
     *
     * @return string
     */
    public function profilePicture()
    {
        if ($this->picture) {
            return "/{$this->picture}";
        }

         return 'http://i.pravatar.cc/200';
    }

    public function hasStudent()
    {
        return $this->hasOne(Student::class, 'user_id', 'id');
    }

    public function hasAssignedClassTeacher()
    {
        return $this->hasOne(AssignClass::class, 'user_id', 'id');
    }

    public function hasNewMessages()
    {
        return $this->hasMany(ChatSystem::class, 'reciever_id', Auth::user()->id)->where('is_read', 0);
    }
    public function hasRecievedMessages()
    {
        return $this->hasMany(ChatSystem::class, 'sender_id', 'id')->where('reciever_id', Auth::user()->id)->where('is_read', 0);
    }

    public function hasLogOut()
    {
        return $this->hasOne(UserLog::class, 'user_id', 'id')->orderby('id', 'desc');
    }

    public function hasReadNotification()
    {
        return $this->hasMany(ReadNotification::class, 'user_id', 'id')->where('is_read', 0);
    }
}
