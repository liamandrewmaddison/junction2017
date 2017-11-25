<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    /**
     * ERROR
     *
     * Handle controller errors
     * @param $message
     */
    public function error($message)
    {
        return response()->json([
            'http' => RESPONSE::HTTP_NOT_FOUND,
            'message' => $message,
            'error' => true,
        ]);
    }

    /**
     * RESPOND
     *
     * Handle controller successes
     * @param $array - Array
     */
    public function respond($data = [], $merge = [])
    {
        $http = ['http' => Response::HTTP_OK];
        if (is_object($data)) {
            $data = ['data' => $data ? $data : []];
            $response = array_merge($http, $merge, $data);
        } else {
            $response = array_merge($http, $merge);
        }
        return response()->json($response);
    }
}
