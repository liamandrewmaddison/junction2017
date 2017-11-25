<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Controllers\Controller as Controller;
use GuzzleHttp\Client;

class OAuthController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Issue Token
     * Request token for authentication
     *
     * @param Request
     * @return JSON String
     */
    public function issueToken($credentials)
    {
        $http = new Client();

        try {
            $response = $http->post(url('/oauth/token'), [
                'form_params' => $credentials,
            ]);
            return json_decode($response->getBody(), true);
        } catch (GuzzleHttp\Exception\ClientException $e) {
            return response()->json([
                'response' => $e->getResponse(),
                'result' =>  $response->getBody(),
            ]);
        }
    }
}
