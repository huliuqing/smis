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
}
