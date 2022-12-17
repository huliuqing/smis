<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;

class LineController extends Controller
{
    use AuthenticatesUsers;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // @TODO
//        $this->middleware('guest')->except('logout');
    }

    public function redirect() {
        // @TODO 获取 redirect path
        return Socialite::driver('line')->redirect();
    }

    public function callback(Request $request) {
        $user = Auth::user();
        $oauthUser = Socialite::driver('line')->stateless()->user();

        $log = [
            'controller' => __CLASS__,
            'method' => __METHOD__,
            'message' => 'line account oauth callback.',
            'data' => [
                'login_user' =>$user,
                'line_user' =>$oauthUser,
            ],
        ];

        Log::debug(json_encode($log));
        if ($this->validUser($user)) {
            Log::debug(json_encode($log + ['message' => 'logic: login user bind line account']));
            return $this->userBindLine($user, $oauthUser);
        }

        Log::debug(json_encode($log + ['message' => 'line account oauth callback.']));
        return $this->loginWithLine($oauthUser);
    }

    private function validUser($user)
    {
        return !empty($user);
    }

    /**
     * userBindLine 登录用户绑定 Line 账号
     * @param $loginUser
     * @param $oauthUser
     * @return \Illuminate\Http\JsonResponse
     */
    private function userBindLine($loginUser, $oauthUser)
    {
        $lineId = $oauthUser->id;
        if ($loginUser->sns_line_id) {
            return $this->failure(['message' => 'Login user has bind line before.']);
        }

        if ($loginUser->type == User::TYPE_UNKNOWN) {
            return $this->failure(['message' => 'User not audit.']);
        }

        if ($loginUser->type != User::TYPE_STUDENT) {
            $cnt = User::where(['sns_line_id' => $lineId, 'type' => User::TYPE_TEACHER])->count();
            if ($cnt) {
                return $this->failure(['message' => 'Line has bind another [Teacher] user.']);
            }
        }

        $loginUser->sns_line_id = $lineId;
        $loginUser->save();

        $token = $loginUser->createToken(env('AUTH_TOKEN_NAME_API'))->accessToken;
        return $this->success(['token' => $token]);
    }

    /**
     * loginWithLine 用户未登录，line 登录
     * @param $oauthUser
     * @return \Illuminate\Http\JsonResponse
     */
    private function loginWithLine($oauthUser)
    {
        $lineId = $oauthUser->id;
        $lineUser = User::where(['sns_line_id' => $lineId])->first();
        if (!$this->validUser($lineUser)) {
            return $this->failure(['message' => 'Line user not exists.']);
        }

        $token = $lineUser->createToken(env('AUTH_TOKEN_NAME_API'))->accessToken;
        return response()->json(['token' => $token], 200);
    }

}