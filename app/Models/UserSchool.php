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

    const AUDIT_MAPPING = [
            UserSchool::TYPE_DEFAULT => '未审核',
            UserSchool::TYPE_SCHOOL_ADMIN => '学校管理员',
            UserSchool::TYPE_SCHOOL_TEACHER => '教师',
            UserSchool::TYPE_SCHOOL_STUDENT => '学生',
        ];

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

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
