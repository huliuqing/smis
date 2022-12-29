<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    public function browser(Request $request)
    {
        $user = Auth::user();
        $type = $request->type ?? $user->type;
        $menu = [];
        if (in_array($type, [User::TYPE_TEACHER, 5])) {
            //管理员 | 普通教师
            $menu = [
                ["name" => "用户列表", "icon" => "nc-badge", "uri" => "/smis/user/browser"],
                ["name" => "学校列表", "icon" => "nc-istanbul", "uri" => "/smis/school/browser"],
                ["name" => "朋友圈", "icon" => "nc-atom", "uri" => "/smis/user/friends"],
            ];
        } elseif ($type == User::TYPE_STUDENT) {
            $menu = [
                ["name" => "用户列表", "icon" => "nc-badge", "uri" => "/smis/user/browser"],
                ["name" => "朋友圈", "icon" => "nc-atom", "uri" => "/smis/user/friends"],
            ];
        }

        if (!empty($user->sns_line_id)) {
            $count = User::where(['sns_line_id' => $user->sns_line_id])->count();
            if ($count > 1) {
                $menu[] = ["name" => "切换用户", "icon" => "", "uri" => "/system/change",];
            }
        }

        return $this->success($menu);

    }
}