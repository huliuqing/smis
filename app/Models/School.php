<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class School extends Model
{
    const STATUS_NORMAL = 1;
    const STATUS_CLOSE = 0;

    protected $table = 'smis_schools';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'creator_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    public function pass(){
        $this->status = self::STATUS_NORMAL;
        return $this;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users(){
        return $this->belongsToMany(User::class, 'smis_user_schools', 'school_id', 'user_id');
    }

    public function withLoginUsers(){
        return $this->belongsToMany(User::class, 'smis_user_schools', 'school_id', 'user_id')
            ->where('users.id', '=', Auth::user()->id);
    }
}
