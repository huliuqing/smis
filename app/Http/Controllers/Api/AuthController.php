<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();

        return response()->json([]);
    }

    public function profile(Request $request)
    {
        $user = auth()->user();
        $user->setAttribute('can_bind', $user->sns_line_id === '');
        return $this->success(['user' => $user]);
    }


    protected function loginByEmail(Request $request)
    {
        $whereStmt = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        return $this->loginAuth($whereStmt);
    }

    protected function loginByName(Request $request)
    {
        $whereStmt = [
            'name' => $request->name,
            'password' => $request->password
        ];
        return $this->loginAuth($whereStmt);
    }

    private function loginAuth(array $whereStmt)
    {
        if (auth()->attempt($whereStmt)) {
            $token = auth()->user()->createToken(env('AUTH_TOKEN_NAME_API'))->accessToken;
            return $this->success(['token' => $token]);
        }

        return response()->json(['error' => 'Unauthorised'], 401);
    }
}
