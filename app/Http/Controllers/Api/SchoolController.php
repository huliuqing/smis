<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\School;
use App\Models\User;
use App\Models\UserSchool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function browserAll(Request $request)
    {
        $schools = School::all();
        return $this->success($schools);
    }

    public function browser(Request $request)
    {
        $schools = School::with(['withLoginUsers'])->paginate(30);
        return $this->success($schools);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
    }

    public function join(Request $request)
    {
        $user = Auth::user();
        // @TODO 支持绑定多学校
        $newRef = [
            'school_id' => $request->school_id,
            'user_id' => $user->id,
            'type' => UserSchool::TYPE_SCHOOL_TEACHER, // 3 for student
        ];

        // @TODO define SchoolUser
        // 学生仅能属于一所学校
        $refSchoolUser = UserSchool::create($newRef);
        if (!$refSchoolUser) {
            return $this->failure(['message' => "School join failure."], 400);
        }

        return response()->json([], 200);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {

        try {
            // @TODO 添加学校注册
            $this->validate($request, [
                'name' => 'required|min:4',
            ]);
        } catch (\Exception $e) {
            return $this->failure(['message' => 'request parameter invalid'], 400);
        }

        // @TODO 事务支持
        $school = $this->storeSchool($request);
        if (false === $school) {
            return $this->failure(['message' => 'school created fail'], 400);
        }

        $refSchoolUser = $this->storeUserSchool($request, $school);

        return $this->success(['school' => $school]);
    }

    /**
     * storeSchool 创建学校
     * @param Request $request
     * @return false
     */
    protected function storeSchool(Request $request)
    {
        $userId = Auth::user()->id;

        $cnt = School::where(['name' => $request->name])->count();
        if ($cnt > 0) {
            return false;
        }

        $school = School::create([
            'name' => $request->name,
            'creator_id' => $userId,
        ]);
        return $school;
    }

    /**
     * storeSchoolUser 创建学校 & 用户关联信息
     * @TODO 创建学校&用户关联数据
     * @param Request $request
     * @param UserSchool $school
     * @return void
     */
    protected function storeUserSchool(Request $request, School $school)
    {
        $userId = Auth::user()->id;
        $new = [
            'school_id' => $school->id,
            'user_id' => $userId,
            'type' => UserSchool::TYPE_SCHOOL_ADMIN,
        ];
        $refUserSchool = UserSchool::create($new);

        return $refUserSchool;
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\School $school
     * @return \Illuminate\Http\Response
     */
    public function show(School $school)
    {
        //
    }
}
