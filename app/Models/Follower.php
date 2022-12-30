<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    protected $table = 'smis_followers';


    /**
     * follower 查看关注我的
     * @return void
     */
    public function followers()
    {
        $this->hasOne(User::class, 'id', 'follower_id');
    }

    /**
     * follower 查看我关注的
     * @return void
     */
    public function followings()
    {
        $this->hasOne(User::class, 'id', 'following_id');
    }
}
