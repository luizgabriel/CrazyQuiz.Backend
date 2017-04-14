<?php

namespace CrazyQuiz\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use ValidatesRequests;

    /**
     * @param $data
     * @return \Illuminate\Http\JsonResponse
     */
    protected function api($data)
    {
        return response()->json([ 'data' => $data, 'size' => count($data) ]);
    }
}
