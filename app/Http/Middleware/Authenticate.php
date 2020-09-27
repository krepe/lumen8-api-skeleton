<?php

namespace App\Http\Middleware;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;
use Tymon\JWTAuth\Facades\JWTAuth;
use Closure;
use Illuminate\Contracts\Auth\Factory as Auth;

class Authenticate
{
    /**
     * The authentication guard factory instance.
     *
     * @var \Illuminate\Contracts\Auth\Factory
     */
    protected $auth;

    /**
     * Create a new middleware instance.
     *
     * @param  \Illuminate\Contracts\Auth\Factory  $auth
     * @return void
     */
    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        //if ($this->auth->guard($guard)->guest()) {
        //    return response('Unauthorized.', 401);
        //}
        try{
            $user=JWTAuth::parseToken()->authenticate();
        }catch (\Exception $e){
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
                return response()->json([
                    'success' => false,
                    'status' => 'Token inválido',
                    'code' => 50002],401);
            }else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiretedException){
                return response()->json([
                    'success' => false,
                    'status' => 'Token expirado',
                    'code' => 50003],401);
            }else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenBlacklistedException){
                return response()->json([
                    'success' => false,
                    'status' => 'Token na BlackList',
                    'code' => 50004],401);
    
            }else if ($e instanceof \Tymon\JWTAuth\Exceptions\JWTException){
                return response()->json([
                    'success' => false,
                    'status' => 'Token ausente',
                    'code' => 50005],401);
            }else{
                return response()->json([
                    'success' => false,
                    'status' => $e->getStatusCode(),
                    'code' => 50001],401);
            }
        }
        return $next($request);
    }
}
