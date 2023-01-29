<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $fillable = [
        'follow_id',
        'follower_id',
    ];

    public function getFollowId($user_id)
    {
        return $this->where('follow_id', $user_id)->select('follower_id')->get();
    }
}
