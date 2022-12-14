<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function JSONResponse($data, int $code = 200)
    {
        return response()->json($data, $code)->setEncodingOptions(JSON_UNESCAPED_UNICODE);
    }

    public function success($data)
    {
        return $this->JSONResponse($data);
    }

    public function failure($data, int $code = 400)
    {
        return $this->JSONResponse($data, $code);
    }
}
