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

    /**
     * @example http://127.0.0.1:8000/login/line/redirect
     * @return mixed
     */
    public function redirect()
    {
        // @TODO 获取 redirect path
        $drive = Socialite::driver('line');
        return $this->success(['redirect_url' => $drive->redirect()->getTargetUrl()]);
    }

    /**
     * @example http://127.0.0.1:8000/login/line/callback?code=6YQgLhaFYvvikm2CGKCA&state=lY6gYx3lLNcZ8Vzf6M3F6G3vY7zoIaOz3BrJ4wck
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function callback(Request $request)
    {
        return response()->redirectTo('http://127.0.0.1:8000/#/smis/user/line/callback?code=' . $request->code);
    }

    public function bindOrLogin(Request $request)
    {
        $user = Auth::user();
        $oauthUser = Socialite::driver('line')->stateless()->user();

        $log = [
            'controller' => __CLASS__,
            'method' => __METHOD__,
            'message' => 'line account oauth callback.',
            'data' => [
                'login_user' => $user,
                'line_user' => $oauthUser,
            ],
        ];

        Log::debug('line callback', $log);
        if ($this->validUser($user)) {
            Log::debug('[START ] bind: bind line.');
            return $this->userBindLine($user, $oauthUser);
        }

        Log::debug('[START] login: line login.');
        return $this->loginWithLine($oauthUser);
    }

    private function validUser($user)
    {
        return $user;
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

//        $token = $loginUser->createToken(env('AUTH_TOKEN_NAME_API'))->accessToken;
        return $this->success(['message' => 'bind line success']);
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
        return response()->json(['token' => $token, 'message' => 'login with line success']);
    }

}