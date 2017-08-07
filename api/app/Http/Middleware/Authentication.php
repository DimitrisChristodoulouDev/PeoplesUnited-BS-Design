<?php

namespace App\Http\Middleware;

use App\UserLogin;
use Closure;

class Authentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($request->hasHeader('AuthToken')){
            $token = $request->header('AuthToken');
        }else{
            return response()->json(['status'=>'error'], 403);
        }

        $user = UserLogin::where('token', '=', $token)->get(['token']);
        if (count($user)){
            return $next($request);
        }else{
            return response()->json(['status'=>'error'], 403);
        }
    }
}
