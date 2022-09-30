<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    const UPDATED_AT = NULL;

    protected $fillable = ['follow_id', 'follower_id'];

    protected $table = 'follows';

    public function users()
    {
        return $this->belongsToMany(User::class, 'follow_id', 'follower_id', 'user_id');
    }
}
