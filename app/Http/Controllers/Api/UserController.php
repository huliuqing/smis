<?php

namespace App\Http\Controllers\Api;

use App\Mail\UserInvite;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserSchool;
use App\Models\School;


class UserController extends Controller
{
    /**
     * 用户列表
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function browser(Request $request)
    {
        $authUser = Auth::user();

        $whereStmt = [
            ['id', '<>', Auth::user()->id],
        ];

        $whereNotIn = ['type' => [User::TYPE_UNKNOWN]];
        if ($authUser->type === User::TYPE_STUDENT) {
            $whereNotIn = ['type' => [User::TYPE_STUDENT, User::TYPE_UNKNOWN]];
        }

        $q = User::where($whereStmt);
        foreach ($whereNotIn as $k => $v) {
            $q = $q->whereNotIn($k, $v);
        }

        $schoolIds = $authUser->schools->pluck('id');
        $users = $q->whereHas('schools', function ($query) use ($schoolIds) {
            $query->whereIn('smis_schools.id', $schoolIds);
        })->with('schools:name')->paginate($request->per_page ?? 30);

        foreach ($users as &$user) {
            $user['school_name'] = $user->schools->pluck('name')->implode(',');
            $user['status_label'] = User::friendlyStatus($user['status']);
            $user['type_label'] = User::friendlyType($user['type']);
        }
        return $this->success($users);
    }

    /**
     * register 注册教师，注册教师审批通过后称为学校「管理员角色」
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $this->prepareRegister($request);

        // @TODO 判断用户是否存在，不存在创建，存在时仅更新用户和学校关联数据
        $type = isset($request->school_id) ? User::TYPE_TEACHER : User::TYPE_UNKNOWN;
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'type' => $type,
            'status' => User::STATUS_NORMAL,
            'sns_line_id' => '',
        ]);

        if (!$user) {
            return $this->failure(['message' => 'register new user failure.'], 400);
        }

        // @TODO 创建用户 & 学校关联数据
        // @TODO 支持绑定多学校
        $newRef = [
            'school_id' => $request->school_id,
            'user_id' => $user->id,
            'type' => UserSchool::TYPE_DEFAULT, // 0 default,when audit pass change school admin
        ];

        $refSchoolUser = UserSchool::create($newRef);
        if (!$refSchoolUser) {
            return $this->failure(['message' => "bind user's school failure."], 400);
        }

        $token = $user->createToken(env('AUTH_TOKEN_NAME_API'))->accessToken;
        return response()->json(['token' => $token], 200);
    }

    private function prepareRegister(Request $request)
    {
        try {
            $this->validate($request, [
                'name' => 'required|min:4',
                'email' => 'required|email',
                'password' => 'required|min:8',
                'school_id' => 'int',
            ]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'register information invalid'], 400);
        }
    }

    /**
     * create 创建学生用户
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|void
     */
    public function create(Request $request)
    {
        $authUser = Auth::user();

        if ($authUser->type === User::TYPE_STUDENT) {
            return $this->failure(['message' => 'not allow'], 403);
        }

        $newUser = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'type' => User::TYPE_STUDENT,
            'status' => User::STATUS_NORMAL,
            'sns_line_id' => '',
        ]);

        if (!$newUser) {
            return $this->failure(['message' => 'create new user failure.'], 400);
        }

        // @TODO 创建用户 & 学校关联数据
        // @TODO 支持绑定多学校
        $newRef = [
            'school_id' => $request->school_id,
            'user_id' => $newUser->id,
            'type' => UserSchool::TYPE_SCHOOL_STUDENT, // 3 for student
        ];

        // @TODO define SchoolUser
        // 学生仅能属于一所学校
        $refSchoolUser = UserSchool::create($newRef);
        if (!$refSchoolUser) {
            return $this->failure(['message' => "bind user's school failure."], 400);
        }

        return response()->json([], 200);
    }

    /**
     * invite 邀请用户成为学校教师，被邀请的教师为普通教师角色
     * @TODO 逻辑需要做验证邀请，还有邀请落地页
     * @param Request $request
     * @return void
     */
    public function invite(Request $request)
    {
        try {
            $this->validate($request, [
                'email' => 'required|email',
                'school_id' => 'int',
            ]);
        } catch (\Exception $e) {
            return $this->failure(['message' => 'parameter invalid.']);
        }

        $userModel = new User();
        $inviteeUser = $userModel->where(['email' => $request->email])->first();
        if (!$inviteeUser) {
            return $this->failure(['message' => 'invite user not exists.']);
        }

        if ($userModel->isTeacher($inviteeUser->type)) {
            return $this->failure(['message' => 'invite user already is a teacher.']);
        }

        $userSchoolModel = new UserSchool();
        $invited = $userSchoolModel->existsRelation($inviteeUser->id, $request->school_id);
        if ($invited) {
            return $this->failure(['message' => 'user invited before.']);
        }

        $school = School::find($request->school_id);
        if (!$school) {
            return $this->failure(['message' => 'invalid invite school.']);
        }

        Mail::send(new UserInvite(Auth::user(), $inviteeUser->email, $school));

        return $this->success(['message' => 'invite email send.']);
    }

    /**
     * followers 粉丝
     * @TODO 权限控制
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function followers(Request $request)
    {
//        DB::enableQueryLog();
        $user = Auth::user();
        $users = $user->followers()->paginate($request->per_page ?? 30);
//        dd(DB::getQueryLog());
        return $this->success($users);
    }

    /**
     * followings 关注
     * @TODO 权限控制
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function followings(Request $request)
    {
        $user = Auth::user();
        $users = $user->followings()->paginate($request->per_page ?? 30);
        return $this->success($users);
    }

    /**
     * schools 获取用户已加入的学校列表
     * @return \Illuminate\Http\JsonResponse
     */
    public function schools(Request $request)
    {
        $user = Auth::user();
        $users = $user->schools()->paginate($request->per_page ?? 30);
        return $this->success($users);
    }

}
