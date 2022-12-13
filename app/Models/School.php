<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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

    public function teacher(){
        return $this->hasOne(SchoolTeacher::class,'sid');
    }

    public function student(){
        return $this->hasOne(User::class,'id','tid');
    }
}
