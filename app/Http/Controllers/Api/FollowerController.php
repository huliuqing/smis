<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowerController extends Controller
{
    /**
     * store 关注用户
     * @param Request $request
     * @param int $id 关注用户ID
     * @return void
     */
    public function store(Request $request, $id)
    {
        $user = Auth::user();
        if (!$user->isFollowing($id)) {
            $user->follow($id);
        }

        return $this->success([]);
    }

    /**
     * destory 取关用户
     * @param Request $request
     * @param int $id 取关用户ID
     * @return void
     */
    public function destory(Request $request, $id)
    {
        $user = Auth::user();
        if ($user->isFollowing($id)) {
            $user->unfollow($id);
        }

        return $this->success([]);
    }
}
