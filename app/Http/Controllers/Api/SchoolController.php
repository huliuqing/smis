<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\School;
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // @TODO 事务支持
        $school = $this->storeSchool($request);
        $refSchoolUser = $this->storeUserSchool($request, $school);

        return $this->success(['school' => $school]);
    }

    /**
     * storeSchool 创建学校
     * @param Request $request
     * @return void
     */
    protected function storeSchool(Request $request)
    {
        $userId = Auth::user()->id;

        try {
            // @TODO 添加学校注册
            $this->validate($request, [
                'name' => 'required|min:4',
            ]);
        } catch (\Exception $e) {
            return $this->failure(['message' => 'register information invalid'], 400);
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
     * @param  \App\Models\School  $school
     * @return \Illuminate\Http\Response
     */
    public function show(School $school)
    {
        //
    }
}
