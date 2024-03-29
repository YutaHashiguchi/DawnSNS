<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'mail', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Relationships
     */
    public function follows()
    {
        return $this->belongsToMany(User::class, 'follows', 'follow_id', 'follower_id');
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'follows', 'follower_id', 'follow_id');
    }
}
