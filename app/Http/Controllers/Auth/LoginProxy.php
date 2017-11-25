<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Controllers\Auth\OAuthController;
use App\Http\Controllers\Controller as Controller;
use App\Repositories\UserRepository as Users;

class LoginProxy extends Controller
{
    /**
     * @var
     */
    private $users;

    /**
     * @var
     */
    private $OAuthHandler;

    /**
     * Construct
     *
     * @param UserRepository
     * @return void
     */
    public function __construct(
        Users $users,
        OAuthController $OAuthHandler
    ){
        $this->users = $users;
        $this->OAuthHandler = $OAuthHandler;
    }

    /**
     * Attempt Login
     * 
     * @param Request
     * @return $this->proxyRequest
     */
    public function attemptLogin(Request $request)
    {
        $email = $request->get('email');
        $password = $request->get('password');
        $user = $this->users->findBy('email', $email);
        if (!is_null($user)) {
            $scopes = ['*'];
            return $this->proxyRequest('password', [
                'username' => $email,
                'password' => $password,
                'scope' => $scopes,
            ]);
        }
    }

    /**
     * Attempt Refresh
     *
     * @param Request
     * @return $this->proxyRequest
     */
    public function attemptRefresh(Request $request)
    {
        $refreshToken = $request->get('refreshToken');
        return $this->proxyRequest('refresh_token', [
            'refresh_token' => $refreshToken
        ]);
    }

    /**
     * Proxy Request
     * Issues token from OAuthController depending on $grantType
     *
     * @param $grantType String
     * @param $data Array
     * @return Token
     */
    public function proxyRequest($grantType, $data = [])
    {
        $data = array_merge([
            'client_id' => env('PASSWORD_CLIENT_ID'),
            'client_secret' => env('PASSWORD_CLIENT_SECRET'),
            'grant_type'    => $grantType,
        ], $data);

        return $this->OAuthHandler->issueToken($data);
    }
}