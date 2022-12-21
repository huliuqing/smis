<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserSchool extends Model
{
    const TYPE_DEFAULT = 0;// when error will be TYPE_DEFAULT
    const TYPE_SCHOOL_ADMIN = 1;
    const TYPE_SCHOOL_TEACHER = 2;
    const TYPE_SCHOOL_STUDENT = 3;

    protected $table = 'smis_user_schools';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'school_id', 'user_id', 'type',
    ];

    public function existsRelation($userId, $schoolId)
    {
        $cnt = $this->where(['user_id' => $userId, 'school_id' => $schoolId])->count();
        return $cnt > 0;
    }
}
