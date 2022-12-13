<?php

namespace App\Http\Controllers\Api\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\AuthController as AbstractAuthController;

class AuthController extends AbstractAuthController
{
    public function login(Request $request)
    {
        return $this->loginByName($request);
    }
}

