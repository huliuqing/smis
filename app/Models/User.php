<?php

namespace App\Models;

use Laravel\Passport\HasApiTokens;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    const STATUS_CLOSE = 0;
    const STATUS_NORMAL = 1;

    const TYPE_UNKNOWN = 0;
    const TYPE_TEACHER = 1;
    const TYPE_STUDENT = 2;

    use LaratrustUserTrait;
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'type', 'status', 'sns_line_id',
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
     * @TODO 教师注册审核
     * @return void
     */
    public function audit()
    {

    }

    /**
     * followings 粉丝
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function followers()
    {
        return $this->belongsToMany(User::class, 'smis_followers', 'user_id', 'follower_id');
    }

    /**
     * followers 关注
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function followings()
    {
        return $this->belongsToMany(User::class, 'smis_followers', 'follower_id', 'user_id');
    }


    /**
     * follow 关注
     * @param $userIds
     * @return array
     */
    public function follow($userIds)
    {
        $userIds = $this->scalarToArray($userIds);

        return $this->followings()->sync($userIds, false);
    }

    /**
     * unfollow 取关
     * @param $userIds
     * @return int
     */
    public function unfollow($userIds)
    {
        $userIds = $this->scalarToArray($userIds);
        return $this->followings()->detach($userIds);
    }

    /**
     * isFollowing 判断登录用户是否关注给定用户
     * @param $userId
     * @return mixed
     */
    public function isFollowing($userId)
    {
        $followed = $this->followings->contains($userId);
        return $followed;
    }

    private function scalarToArray($v)
    {
        if (!is_array($v)) {
            $v = compact('v');
        }

        return $v;
    }

    public function isTeacher($givenType)
    {
        return self::TYPE_TEACHER === $givenType;
    }
}
