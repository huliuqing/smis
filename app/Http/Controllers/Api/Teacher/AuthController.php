<?php

namespace App\Http\Controllers\Api\Teacher;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Api\AuthController as AbstractAuthController;

class AuthController extends AbstractAuthController
{
    public function login(Request $request)
    {
        return $this->loginByEmail($request);
    }
}

