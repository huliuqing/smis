<?php

namespace App\Http\Controllers\Api;

use App\Models\UserSchool;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
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

        // @TODO define SchoolUser
        $refSchoolUser = UserSchool::create($newRef);
        if (!$refSchoolUser) {
            return $this->failure(['message' => "bind user's school failure."], 400);
        }

        $token = $user->createToken('Laravel-9-Passport-Auth')->accessToken;
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
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'type' => User::TYPE_STUDENT,
            'status' => User::STATUS_NORMAL,
            'sns_line_id' => '',
        ]);

        if (!$user) {
            return $this->failure(['message' => 'create new user failure.'], 400);
        }

        // @TODO 创建用户 & 学校关联数据
        // @TODO 支持绑定多学校
        $newRef = [
            'school_id' => $request->school_id,
            'user_id' => $user->id,
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
}
