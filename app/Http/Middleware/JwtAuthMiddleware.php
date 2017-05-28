<?php

namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use App\Beak\Response;

class JwtAuthMiddleware
{  
    protected $jwt;
    private $response;

    public function __construct(JWTAuth $jwt){
         $this->jwt = $jwt;
         $this->response  = new Response();
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   
        try{

            if (! $user = $this->jwt->parseToken()->authenticate()) {
                return $response->badRequest(collect([
                        'access_token'  => 'user_not_found'
                    ]));
            }

        } catch (TokenExpiredException $e){
            return $this->response->Unauthorized(collect([
                    'access_token'  => 'token_expired'
                ]));
        } catch (TokenInvalidException $e){
            return $this->response->badRequest(collect([
                    'access_token'  => 'token_invalid'
                    ]));
        } catch (JWTException $e){
            return $this->response->badRequest(collect([
                    'access_token'  => 'token_absent'
                    ]));
        }

        $request->request->add(['auth_user' => $user]);
        return $next($request);
    }
}
